@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
@endprepend
@section('content')
    @include('includes.success')
    <div class="card">
        <form action="{{ route('roles.store') }}" method="POST">
            <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                <div class="card-title text-white">
                    Create New Role
                </div>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                           placeholder="Enter Role Name" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                Permissions :
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-lg-4 mt-2">
                            <div class="form-check form-switch ms-5">
                                <input class="form-check-input" name="permissions[{{ $permission->id }}]"
                                       type="checkbox" id="permission-{{ $permission->id }}">
                                <label class="form-check-label"
                                       for="permission-{{ $permission->id }}">{{ str()->headline($permission->name)  }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-end">
                <div>
                    <input type="submit" class="btn btn-soft-primary" value="Submit">
                </div>
            </div>
        </form>
    </div>
    @push('page-scripts')
        <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/plugins/datatables/dataTables.bootstrap5.min.js') }}"></script>
        <script>
        </script>
    @endpush
@endsection
