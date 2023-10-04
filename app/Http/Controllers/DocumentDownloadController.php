<?php

namespace App\Http\Controllers;

use App\Repositories\DocumentRepository;

class DocumentDownloadController extends Controller
{
    public function __invoke(DocumentRepository $documentRepository, int $id)
    {
        $document = $documentRepository->find($id);

        return response()->download($document->file_path, basename($document->file_path));
    }
}
