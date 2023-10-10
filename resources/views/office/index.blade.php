@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/plugins/datatables/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
@endprepend
@section('content')
    @include('includes.success')
    <div class="card shadow-sm rounded-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">
                Complete listing <span class="text-lowercase">of</span> <span class="fw-bold">office</span>
            </div>
            <a href="{{ route('office.create') }}" class="btn btn-soft-primary fw-medium">
                Add New Office
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Name</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Telephone Number</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Phone Number</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Email</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Office Head</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($offices as $office)
                    <tr>
                        <td class="text-start"><span class="ms-2"></span>{{ $office->name }}</td>
                        <td class="text-center">{{ $office->telephone_number }}</td>
                        <td class="text-center">{{ $office->phone_number }}</td>
                        <td class="text-start"><span class="ms-2"></span>{{ $office->email }}</td>
                        <td class="text-center"><span class="ms-2"></span>N/A</td>
                        <td class="text-center">
                            <form action="{{ route('office.destroy', $office) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-soft-success" href="{{ route('office.edit', $office) }}">Edit</a>
                                <button type="submit" class="btn btn-soft-danger">Delete</button>
                            </form>
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
            let table = $('table').DataTable({
                ordering: false,
            });
        </script>
    @endpush
@endsection
