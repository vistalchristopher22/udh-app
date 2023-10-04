<?php

namespace App\Http\Controllers;

use App\Enums\AccessType;
use App\Http\Requests\Form\StoreRequest;
use App\Http\Requests\Form\UpdateRequest;
use App\Models\Document;
use App\Pipes\FormTemplate\StoreDocument;
use App\Pipes\FormTemplate\UpdateDocument;
use App\Pipes\FormTemplate\UploadDocument;
use App\Pipes\Tags\ParseTags;
use App\Repositories\DocumentRepository;
use App\Repositories\OfficeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Pipeline;

final class DocumentController extends Controller
{
    private readonly OfficeRepository $officeRepository;

    public function __construct(private readonly DocumentRepository $documentRepository)
    {
        $this->officeRepository = app()->make(OfficeRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('document.index', [
            'forms' => $this->documentRepository->get(),
            'availableFileTypes' => $this->documentRepository->getAvailableFileTypes(),
            'availableUploadedBy' => $this->documentRepository->getAvailableUploadedBy(),
            'accessLevels' => AccessType::cases(),
            'offices' => $this->officeRepository->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('document.create', [
            'offices' => $this->officeRepository->get(),
            'accessLevels' => AccessType::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return DB::transaction(function () use ($request) {
            return Pipeline::send($request->all())
                ->through([
                    UploadDocument::class,
                    StoreDocument::class,
                    ParseTags::class,
                ])->then(fn ($data) => back()->with('success', 'Imported successfully!'));
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('document.edit', [
            'document' => $document,
            'offices' => $this->officeRepository->get(),
            'accessLevels' => AccessType::cases(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Document $document)
    {
        return DB::transaction(function () use ($request, $document) {
            return Pipeline::send(['form' => $request->all(), 'model' => $document])
                ->through([
                    UploadDocument::class,
                    UpdateDocument::class,
                    ParseTags::class,
                ])->then(fn ($data) => back()->with('success', 'Imported successfully!'));
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
