<?php

namespace App\Jobs;

use App\Models\UserFile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\PdfToImage\Exceptions\PdfDoesNotExist;
use Spatie\PdfToImage\Pdf;

class ProcessPDFJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $filePath;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly UserFile $file, string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $extension = pathinfo(basename($this->filePath), PATHINFO_EXTENSION);
        shell_exec('"C:\Program Files\LibreOffice\program\soffice" --headless --convert-to pdf "' . escapeshellarg($this->filePath) . '" --outdir ' . escapeshellarg(dirname($this->filePath)));
        $thumbnailPath = public_path() . '\\storage\\uploadedFiles\\thumbnails\\' . basename($this->filePath);
        try {
            $pdf = new Pdf(public_path() . '\\storage\\uploadedFiles\\' . basename(str_replace($extension, 'pdf', $this->filePath)));
            $pdf->setOutputFormat('png')->saveImage(str_replace('pdf', 'png', $thumbnailPath));
            $this->file->thumbnail =  '/storage/uploadedFiles/thumbnails/'.str_replace('pdf', 'png', basename($thumbnailPath)) ?? '';
            $this->file->save();
        } catch (PdfDoesNotExist $e) {
            dd($e->getMessage());
        }
    }
}
