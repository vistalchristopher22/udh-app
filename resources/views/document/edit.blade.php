@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endprepend
@section('content')
    @include('includes.success')
    <div class="card">
        <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <div class="card-title text-white">
                Edit Form / Document
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('document.update', $document) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="required">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $document->name) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description" class="required">Description</label>
                    <textarea name="description" id="description" cols="30" rows="3"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $document->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="office" class="required">Office Responsible</label>
                    <select name="office" class="form-select" id="office">
                        @foreach ($offices as $office)
                            <option {{ $office->id === $document->office_responsible ? 'selected' : '' }}
                                value="{{ $office->id }}">{{ $office->name }}</option>
                        @endforeach
                    </select>
                    @error('access_level')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="access_level" class="required">Access Level</label>
                    <select name="access_level" class="form-select" id="access_level">
                        @foreach ($accessLevels as $accessLevel)
                            <option {{ $accessLevel->value === $document->access_level ? 'selected' : '' }}
                                value="{{ $accessLevel->value }}">{{ $accessLevel->name }}</option>
                        @endforeach
                    </select>
                    @error('access_level')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file" class="required">File</label>
                    <input type="file" name="file" id="file" class="form-control">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <input type="text" id="tags" name="tags" class="form-control"
                        placeholder="Select or enter an option" value="{{ $document->tags->implode('name', ',') }}">
                </div>

                <div class="text-end mt-3">
                    <input type="submit" class="btn btn-soft-success" value="Update">
                </div>
            </form>
        </div>
    </div>
    @push('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script>
            var textRemove = new Choices(
                document.getElementById('tags'), {
                    allowHTML: false,
                    delimiter: ',',
                    editItems: true,
                    maxItemCount: 5,
                    removeItemButton: true,
                }
            );
        </script>
    @endpush
@endsection
