<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index(Request $request)
    {
        $folderId = $request->get('folder_id');
        if ($folderId) {
            // Return child folders of the specified folder
            return Folder::where('parent_id', $folderId)->get();
        }

        // Return root folders (folders that don't have a parent folder)
        return Folder::whereNull('parent_id')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:folders,id',
        ]);

        $folder = new Folder([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'user_id' => auth()->id(),
        ]);
        $folder->save();

        return response()->json($folder, 201);
    }
}
