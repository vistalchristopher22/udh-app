@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endprepend
@section('content')
    @include('includes.success')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">
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
                    <textarea id="description" name="description" cols="30" rows="3"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $document->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="office" class="required">Office Responsible</label>
                    <select id="office" name="office" class="form-select">
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
                    <select id="access_level" name="access_level" class="form-select">
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
                    <input id="file" type="file" name="file" class="form-control">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('cagegory_id', $document->category->id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <select id="tags" multiple name="tags[]" class="form-control"
                        placeholder="Select or enter an option">
                        @foreach ($tags as $tag)
                            <option {{ in_array($tag->id, $documentTags) ? 'selected' : ""}} value="{{ $tag->id }}">
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Dynamic Requirement Fields -->
                <div class="form-group d-flex align-items-center justify-content-between">
                    <label for="requirements">Requirements:</label>
                    <button id="add-requirement" type="button" class="btn btn-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                        Add Requirements
                    </button>
                </div>

                <div id="requirements-container">
                    @foreach ($document->requirements as $requirement)
                        <div class="requirement-item mb-2">
                            <button type="button" class="remove-requirement btn btn-danger float-end fw-bold px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" style="pointer-events: none;" width="16"
                                    height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path
                                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg>
                            </button>
                            <input type="text" name="requirements[]" class="form-control"
                                value="{{ $requirement->description }}">
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="text-end mt-3">
                    <input type="submit" class="btn btn-soft-success" value="Update">
                </div>
            </form>
        </div>
    </div>
    @push('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script>
            let textRemove = new Choices(
                document.getElementById('tags'), {
                    allowHTML: false,
                    editItems: true,
                    maxItemCount: 5,
                    removeItemButton: true,
                }
            );
        </script>

        <script>
            // Add dynamic requirement fields
            document.getElementById('add-requirement').addEventListener('click', function() {
                let container = document.getElementById('requirements-container');
                let requirementItem = document.createElement('div');
                requirementItem.classList.add('requirement-item');

                let inputElement = document.createElement('input');
                inputElement.setAttribute('type', 'text');
                inputElement.classList.add('form-control', 'mb-2');
                inputElement.setAttribute('name', 'requirements[]');

                let removeButton = document.createElement('button');
                removeButton.setAttribute('type', 'button');
                removeButton.setAttribute('type', 'button');
                removeButton.setAttribute('tabindex', '-1')
                removeButton.classList.add('btn', 'btn-danger', 'float-end', 'remove-requirement' ,'px-2');
                removeButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="pointer-events:none;"
                                    fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path
                                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                </svg>`;

                requirementItem.appendChild(inputElement);
                requirementItem.prepend(removeButton);
                container.appendChild(requirementItem);
            });

            // Remove dynamic requirement fields
            document.addEventListener('click', function(event) {
                if (event.target && event.target.classList.contains('remove-requirement')) {
                    event.target.parentElement.remove();
                }
            });
        </script>
    @endpush
@endsection
