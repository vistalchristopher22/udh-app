<?php

namespace App\Http\Controllers;

use App\Http\Requests\Office\StoreRequest;
use App\Http\Requests\Office\UpdateRequest;
use App\Models\Office;
use App\Repositories\OfficeRepository;

final class OfficeController extends Controller
{
    public function __construct(private readonly OfficeRepository $officeRepository)
    {
        $this->middleware('role:administrator');
    }

    public function index()
    {
        return view('office.index', [
            'offices' => $this->officeRepository->get(),
        ]);
    }

    public function create()
    {
        return view('office.create');
    }

    public function store(StoreRequest $request)
    {
        $this->officeRepository->create($request->all());

        return back()->with('success', 'Office Created Successfully!');
    }

    public function edit(Office $office)
    {
        return view('office.edit', [
            'office' => $office,
        ]);
    }

    public function update(int $officeId, UpdateRequest $request)
    {
        $this->officeRepository->update($officeId, $request->all());

        return back()->with('success', 'Office Updated Successfully!');
    }

    public function destroy(int $office)
    {
        $this->officeRepository->delete($office);

        return back()->with('success', 'Office Deleted Successfully!');
    }
}
