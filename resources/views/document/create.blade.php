@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
@endprepend
@section('content')
    @include('includes.success')
    <div class="card rounded-0 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title text-dark">
                Add New Form / Document
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="file" class="required">File</label>
                    <input id="file" type="file" name="file"
                           class="form-control @error('file') is-invalid @enderror">
                    @error('file')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file" class="required">Fiscal Year</label>
                    <input id="fiscal_year" type="number" name="fiscal_year" value="{{ old('fiscal_year', date('Y')) }}"
                           class="form-control @error('fiscal_year') is-invalid @enderror">
                    @error('fiscal_year')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

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
                    <textarea id="description" name="description" cols="30" rows="3"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
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
                            <option {{ old('office') == $office->id ? 'selected' : '' }} value="{{ $office->id }}">
                                {{ $office->name }} - {{ $office->code }}</option>
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
                            <option {{ old('access_level') == $accessLevel->value ? 'selected' : '' }}
                                    value="{{ $accessLevel->value }}">{{ $accessLevel->name }}</option>
                        @endforeach
                    </select>
                    @error('access_level')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="category_id" class="required">Category</label>
                    <select id="category_id" name="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <select id="tags" multiple name="tags[]" class="form-control"
                            placeholder="Select or enter an option">
                        @foreach ($tags as $tag)
                            <option {{ in_array($tag->id, old('tags') ?? []) ? 'selected' : '' }}
                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-flex align-items-center justify-content-between">
                    <label for="requirements">Requirements:</label>
                    <button id="add-requirement" type="button" class="btn btn-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                        Add Requirements
                    </button>
                </div>

                <div id="requirements-container">
                </div>
                <hr>

                <div class="text-end mt-3">
                    <input type="submit" class="btn btn-soft-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
    @push('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script>
            new Choices(
                document.getElementById('tags'), {
                    editItems: true,
                    maxItemCount: 5,
                    removeItemButton: true,
                }
            );
            new Choices(document.getElementById('category_id'));
            new Choices(document.getElementById('office'));
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const requirementsContainer = document.getElementById('requirements-container');
                const addRequirementButton = document.getElementById('add-requirement');

                addRequirementButton.addEventListener('click', function () {
                    // Create a new requirement field
                    const requirementField = document.createElement('div');
                    requirementField.classList.add('mb-2');

                    const requirementInput = document.createElement('input');
                    requirementInput.setAttribute('type', 'text');
                    requirementInput.setAttribute('name', 'requirements[]');
                    requirementInput.setAttribute('placeholder', 'Enter requirement description');
                    requirementInput.classList.add('form-control');

                    const removeButton = document.createElement('button');
                    removeButton.setAttribute('type', 'button');
                    removeButton.setAttribute('tabindex', '-1')
                    removeButton.classList.add('btn', 'btn-danger', 'float-end', 'rounded-0');
                    removeButton.textContent = 'X';

                    removeButton.addEventListener('click', function () {
                        requirementsContainer.removeChild(requirementField);
                    });

                    requirementField.appendChild(requirementInput);
                    requirementField.prepend(removeButton);
                    requirementsContainer.appendChild(requirementField);
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const fileInput = document.querySelector("#file");
                const nameInput = document.querySelector("#name");
                const descriptionInput = document.querySelector('#description');

                fileInput.addEventListener("change", function () {
                    // Get the selected file's name
                    const fileNameWithExtension = this.files[0].name;

                    // Remove the file extension
                    const fileNameWithoutExtension = fileNameWithExtension.split('.').slice(0, -1).join('.');

                    // Update the "Name" input field with the file name without extension
                    nameInput.value = fileNameWithoutExtension;
                    descriptionInput.value = fileNameWithoutExtension;
                });
            });
        </script>
    @endpush
@endsection
