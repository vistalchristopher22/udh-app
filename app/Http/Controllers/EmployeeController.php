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
        $data = $request->except('role');

        if (is_null($request->password)) {
            $data = $request->except(['password', 'password_confirmation', 'role']);
        }

        $this->employeeRepository->update($employeeID, $data);

        return to_route('employee.index')->with('success', 'Employee updated successfully');
    }
}
