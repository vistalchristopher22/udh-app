@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
@endprepend
@section('content')
    @include('includes.success')

    <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="permissionModalLabel">New Permission Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="permissionName" class="required">Permission Name</label>
                        <input type="text" class="form-control" id="permissionName" name="permissionName">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSaveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <div class="card-title text-white">
                Complete listing <span class="text-lowercase">of</span> Roles & Permissions
            </div>
            <a href="{{ route('roles.create') }}" class="btn btn-light shadow-lg fw-medium">
                Add New Role
            </a>
        </div>
        <div class="card-body">
            <button class="btn btn-dark mb-2 shadow-lg" data-bs-toggle="modal" data-bs-target="#permissionModal"
                    id="btnCreatePermission">Create New Permission
            </button>
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Roles</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">No. of Permissions</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Created At</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td class="text-uppercase">
                            <span class="me-2"></span>
                            {{ $role->name }}
                        </td>
                        <td class="text-center">{{ $role?->permissions_count }}</td>
                        <td class="text-center">{{ $role->created_at->format('F d, Y h:i A') }}</td>
                        <td class="text-center">
                            <a class="btn btn-soft-success" href="{{ route('roles.edit', $role->id) }}">Edit</a>
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
        <script>
            document.querySelector('#btnSaveChanges').addEventListener('click', () => {
                let permissionName = document.querySelector('#permissionName').value;

                fetch("/api/permission-create",
                    {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                        method: "POST",
                        body: JSON.stringify({
                            name: permissionName
                        }),
                    })
                    .then((res) => {
                        return res.json();
                    })
                    .then((data) => {
                        alert(JSON.stringify(data))
                    });
            });
        </script>
    @endpush
@endsection
