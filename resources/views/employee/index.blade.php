@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endprepend
@section('content')
    @include('includes.success')
    <div class="card shadow-sm rounded-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div class="card-title">
                Complete listing <span class="text-lowercase">of</span> Employees / Users
            </div>
            @can('create employee')
                <a href="{{ route('employee.create') }}" class="btn btn-dark shadow-lg fw-medium">
                    Add New Employee / User
                </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Fullname</th>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Position</th>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Office</th>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Work Status</th>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Active Status</th>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Email</th>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Phone Number</th>
                        <th class="text-center h6 text-uppercase p-2 bg-light">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="text-start"><span class="ms-2"></span>{{ $employee->fullname }}</td>
                            <td class="text-start"><span class="ms-2"></span>{{ $employee?->position_detail?->name }}</td>
                            <td class="text-start"><span class="ms-2"></span>{{ $employee?->office_detail?->name }} -
                                {{ $employee?->office_detail?->campus?->name }}</td>
                            <td class="text-start"><span class="ms-2"></span>{{ $employee->work_status }}</td>
                            <td class="text-center"><span class="ms-2"></span>
                                <span @class([
                                    'badge',
                                    'bg-soft-success' => $employee->active_status === 1,
                                    'bg-soft-danger' => $employee->active_status === 0,
                                ])>
                                    {{ $employee->active_status === 1 ? 'Active' : 'In-active' }}
                                </span>
                            </td>
                            <td class="text-start"><span class="ms-2"></span>{{ $employee->email }}</td>
                            <td class="text-start"><span class="ms-2"></span>{{ $employee->phone_number }}</td>
                            <td class="text-center">
                                <a class="btn btn-soft-success"
                                    href="{{ route('employee.edit', $employee->employee_id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('page-scripts')
        <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
        <script></script>
    @endpush
@endsection
