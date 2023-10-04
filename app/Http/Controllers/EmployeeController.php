<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use App\Repositories\OfficeRepository;
use App\Repositories\PositionRepository;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    private readonly OfficeRepository $officeRepository;

    private readonly PositionRepository $positionRepository;

    public function __construct(private readonly EmployeeRepository $employeeRepository)
    {
        $this->officeRepository = app()->make(OfficeRepository::class);
        $this->positionRepository = app()->make(PositionRepository::class);
        $this->middleware(['permission:View Employees'])->only('index');
        $this->middleware(['permission:edit employee'])->only('edit');
        $this->middleware(['permission:edit employee'])->only('update');
        $this->middleware(['permission:create employee'])->only('create');
        $this->middleware(['permission:create employee'])->only('store');
    }

    public function index()
    {
        return view('employee.index', [
            'employees' => $this->employeeRepository->get(),
        ]);
    }

    public function store(StoreRequest $request)
    {
        $this->employeeRepository->create($request->all());

        return redirect()->back()->with('success', 'Employee created successfully');
    }

    public function create()
    {
        return view('employee.create', [
            'offices' => $this->officeRepository->get(),
            'positions' => $this->positionRepository->get(),
        ]);
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', [
            'employee' => $employee,
            'offices' => $this->officeRepository->get(),
            'positions' => $this->positionRepository->get(),
            'roles' => Role::has('permissions')->get(),
        ]);
    }

    public function update(string $employeeID, UpdateRequest $request)
    {
        $this->employeeRepository->update($employeeID, $request->except('password_confirmation'));

        return to_route('employee.index')->with('success', 'Employee updated successfully');
    }
}
