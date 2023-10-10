@extends('layouts.app')
@section('page-title', '')
@section('content')
    @include('includes.success')
    <div class="card rounded-0 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">
                Add New Position
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('position.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="required">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="required">Description</label>
                    <input id="description" type="text" name="description"
                           value="{{ old('description') }}"
                           class="form-control @error('description') is-invalid @enderror">
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="salary_grade" class="required">Salary Grade</label>
                    <input id="salary_grade" type="text" name="salary_grade"
                           value="{{ old('salary_grade') }}"
                           class="form-control @error('salary_grade') is-invalid @enderror">
                    @error('salary_grade')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="step" class="required">Step</label>
                    <input id="step" type="text" name="step"
                           value="{{ old('step') }}"
                           class="form-control @error('step') is-invalid @enderror">
                    @error('step')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="text-end mt-3">
                    <input type="submit" class="btn btn-soft-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
@endsection
