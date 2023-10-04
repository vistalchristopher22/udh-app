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
        <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <div class="card-title text-white">
                Complete listing <span class="text-lowercase">of</span> position
            </div>
            <a href="{{ route('position.create') }}" class="btn btn-light shadow-lg fw-medium">
                Add New Position
            </a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Name</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Description</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Salary Grade</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Step</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td class="text-start"><span class="ms-2"></span>{{ $position->name }}</td>
                        <td class="text-start"><span class="ms-2"></span>{{ $position->description }}</td>
                        <td class="text-center">{{ $position->salary_grade }}</td>
                        <td class="text-center">{{ $position->step }}</td>
                        <td class="text-center">
                            <form action="{{ route('position.destroy', $position) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-soft-success" href="{{ route('position.edit', $position) }}">Edit</a>
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
