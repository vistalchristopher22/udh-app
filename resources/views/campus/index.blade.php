@extends('layouts.app-vue')
@section('tab-title', 'Campus')
@section('content')
    @include('includes.success')
    <div class="card shadow-sm rounded-0">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div class="card-title">
                Complete listing <span class="text-lowercase">of</span> Campuses
            </div>
            @can('create employee')
                <a href="{{ route('campus.create') }}" class="btn btn-dark shadow-lg fw-medium">
                    Add New Campus
                </a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Name</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Description</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">No. of Offices</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Created At</th>
                    <th class="text-center h6 text-uppercase p-2 bg-light">Actions</th>
                </thead>
                <tbody>
                    @foreach($campuses as $campus)
                    <tr>
                        <td>
                            <span class="mx-2">{{ $campus->name }}</span>
                        </td>
                        <td>
                            <span class="mx-2">{{ $campus->description }}</span>
                        </td>
                        <td class="text-center">
                            {{ $campus?->offices->count() }}
                        </td>
                        <td class="text-center">
                            <span>{{ $campus->created_at->format('F d, Y h:i A') }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('campus.edit', $campus->id) }}" class="btn btn-soft-success mx-3">Edit</a>
                            <a href="" class="btn btn-soft-danger">Delete</a>
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
