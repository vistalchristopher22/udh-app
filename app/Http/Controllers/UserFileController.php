<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\UserFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\PdfToImage\Pdf;

class UserFileController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->store('public/uploadedFiles');

            $fullPath = Str::replace('/', '\\', storage_path('app/'.$path));
            shell_exec('"C:\Program Files\LibreOffice\program\soffice" --headless --convert-to pdf "'.escapeshellarg($fullPath).'" --outdir '.escapeshellarg(dirname($fullPath)));

            $thumbnailPath = public_path().'\\storage\\uploadedFiles\\thumbnails\\'.basename($fullPath);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $pdf = new Pdf(public_path().'\\storage\\uploadedFiles\\'.basename(str_replace($extension, 'pdf', $fullPath)));
            $pdf->setOutputFormat('png')->saveImage(str_replace('pdf', 'png', $thumbnailPath));

            $userFile = UserFile::create([
                'name' => $filename,
                'description' => $request->description ?? '',
                'uploaded_at' => now(),
                'file_path' => $path,
                'file_type' => $extension,
                'size' => $file->getSize(),
                'version' => '1.0',
                'thumbnail' => '/storage/uploadedFiles/thumbnails/'.str_replace('pdf', 'png', basename($thumbnailPath)) ?? '',
                'status' => 'active',
                'uploaded_by' => Auth::id(),
            ]);

            return response()->json($userFile, 201);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function files()
    {
        $files = UserFile::whereNull('folder_id')->get();

        return response()->json($files);
    }

    public function rename(Request $request, UserFile $file)
    {
        $request->validate([
            'new_name' => 'required|string',
        ]);

        $file->update(['name' => $request->new_name]);

        return response()->json(['message' => 'File renamed successfully']);
    }

    public function destroy(UserFile $file)
    {
        $file->delete();

        return response()->json(['message' => 'File deleted successfully']);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $files = UserFile::where('name', 'like', '%'.$query.'%')->get();

        return response()->json($files);
    }

    public function getFilesByFolder(Request $request)
    {
        $folderId = $request->get('folder_id');
        $data = [];

        if ($folderId) {
            $data['files'] = UserFile::where('folder_id', $folderId)->get();
            $data['folders'] = Folder::where('parent_id', $folderId)->get();
        } else {
            $data['files'] = UserFile::all();
            $data['folders'] = Folder::whereNull('parent_id')->get(); // Get root folders
        }

        return response()->json($data);
    }

    public function moveToFolder(Request $request, $fileId)
    {
        $file = UserFile::findOrFail($fileId);

        $folderId = $request->get('folder_id');
        $folder = Folder::findOrFail($folderId); // Ensure the folder exists

        $file->folder_id = $folder->id;
        $file->save();

        return response()->json(['message' => 'File moved successfully', 'data' => $folder], 200);
    }

    public function trash()
    {
        $files = UserFile::onlyTrashed()->get();

        return response()->json($files);
    }
}
