<?php

namespace App\Http\Controllers;

use App\Models\ServiceProcess;
use App\Repositories\DocumentRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\OfficeRepository;
use App\Services\DocumentProcessService;
use Illuminate\Http\Request;

final class DocumentServiceProcessController extends Controller
{
    private readonly OfficeRepository $officeRepository;

    private readonly EmployeeRepository $employeeRepository;

    public function __construct(private readonly DocumentRepository $documentRepository)
    {
        $this->officeRepository = app()->make(OfficeRepository::class);
        $this->employeeRepository = app()->make(EmployeeRepository::class);
    }

    public function store(Request $request)
    {
        ServiceProcess::create([
            'document_id'                => $request->documentId,
            'office_id'                  => $request->office,
            'description'                => $request->description,
            'look_for'                   => $request->lookFor,
            'secretary'                  => $request->secretary,
            'estimated_days_to_process'  => $request->estimatedDurationDays ?? 0,
            'estimated_duration_hours'   => $request->estimatedDurationHours ?? 0,
            'estimated_duration_minutes' => $request->estimatedDurationMinutes ?? 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function create(int $document)
    {
        $document = $this->documentRepository
            ->find($document)
            ->load(['uploaded_by_detail', 'office_responsible_detail', 'tags', 'how_to_complete', 'how_to_complete.office', 'how_to_complete.person_in_charge', 'how_to_complete.secretary']);

        $serviceCoordinates = DocumentProcessService::getProcessCoordinates($document);

        return view('document.service.create', [
            'document'           => $document,
            'offices'            => $this->officeRepository->get(),
            'employees'          => $this->employeeRepository->get(),
            'serviceCoordinates' => $serviceCoordinates,
        ]);
    }

    public function edit(int $service)
    {
        return ServiceProcess::find($service);
    }

    public function update(int $service, Request $request)
    {
        $service = ServiceProcess::find($service);
        $service->office_id = $request->office;
        $service->description = $request->description;
        $service->look_for = $request->lookFor;
        $service->secretary = $request->secretary;
        $service->estimated_days_to_process = $request->estimatedDurationDays ?? 0;
        $service->estimated_duration_hours = $request->estimatedDurationHours ?? 0;
        $service->estimated_duration_minutes = $request->estimatedDurationMinutes ?? 0;
        $service->save();

        return response()->json(['success' => true]);
    }

}
