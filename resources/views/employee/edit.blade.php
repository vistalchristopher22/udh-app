@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
@endprepend
@section('content')
    @include('includes.success')
    <form action="{{ route('employee.update', $employee) }}" method="POST">
        <div class="card">
            <div class="card-header bg-dark d-flex justify-content-between align-items-center">
                <div class="card-title text-white">
                    Edit Employee / User
                </div>
            </div>
            <div class="card-body">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="first_name" class="required">Employee ID:</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('employee_id') is-invalid @enderror"
                               value="{{ old('employee_id', $employee->employee_id) }}" name="employee_id">
                        <button class="btn btn-dark btn-sm" type="button" id="generateEmployeeID"><i
                                data-feather="search"></i></button>
                    </div>
                    @error('employee_id')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="first_name" class="required">First Name:</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder=""
                           name="first_name" id="first_name"
                           value="{{ old('first_name', $employee->first_name) }}">
                    @error('first_name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" class="form-control @error('middle_name') is-invalid @enderror"
                           name="middle_name" id="middle_name"
                           value="{{ old('middle_name', $employee->middle_name) }}">
                    @error('middle_name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="last_name" class="required">Last Name:</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                           id="last_name"
                           value="{{ old('last_name', $employee->last_name) }}">
                    @error('last_name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="suffix">Suffix:</label>
                    <input type="text" class="form-control @error('suffix') is-invalid @enderror" name="suffix"
                           id="suffix" value="{{ old('suffix', $employee->suffix) }}">
                    @error('suffix')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="required">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder=""
                           name="email" id="email" value="{{ old('email', $employee->email) }}">
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                           id="password">
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new-password">Password Confirmation:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password_confirmation" id="new-password">
                    @error('password')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number" class="required">Phone Number:</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder=""
                           name="phone_number" id="phone_number"
                           value="{{ old('phone_number', $employee->phone_number) }}">
                    @error('phone_number')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="office" class="required">Office:</label>
                    <select name="office" class="form-select @error('office') is-invalid @enderror" id="office">
                        <option value="">Select Office</option>
                        @foreach ($offices as $office)
                            <option
                                value="{{ $office->id }}" {{ old('office', $employee->office) == $office->id ? 'selected' : '' }}>
                                {{ $office->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('office')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="required">Address:</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                              id="address">{{ old('address', $employee->address) }}</textarea>
                    @error('address')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="position" class="required">Position:</label>
                    <select name="position" class="form-select @error('position') is-invalid @enderror" id="position">
                        <option value="">Select Position</option>
                        @foreach ($positions as $position)
                            <option
                                value="{{ $position->id }}" {{ old('position', $employee->position) == $position->id ? 'selected' : '' }}>
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('position')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="work_status" class="required">Work Status:</label>
                    <input type="text" name="work_status"
                           class="form-control @error('work_status') is-invalid @enderror" id="work_status"
                           value="{{ old('work_status', $employee->work_status) }}">
                    @error('work_status')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="active_status" class="required">Active Status:</label>
                    <select name="active_status" class="form-select @error('active_status') is-invalid @enderror"
                            id="active_status">
                        <option value="">Select Status</option>
                        <option value="1" {{ old('activeStatus', $employee->active_status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ old('activeStatus', $employee->active_status) == 0 ? 'selected' : '' }}>
                            In-active
                        </option>
                    </select>
                    @error('active_status')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role" class="required">Role:</label>
                    <div class="input-group">
                        <select class="form-select" name="role" id="role">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option class="text-uppercase" value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-dark btn-sm shadow-none outline-none" type="button"
                                id="btnViewRolePermission"><i
                                data-feather="eye"></i></button>
                    </div>
                    @error('employee_id')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <ul id="permissions-container">

                    </ul>
                </div>

            </div>
        </div>


        <div class="text-end my-3">
            <button type="submit" class="btn btn-soft-success">Update</button>
        </div>
    </form>

    @push('page-scripts')
        <script>
            document.querySelector("#role").addEventListener('change', function (event) {
                let value = event.target.value;
                fetch(`/api/role-fetch-permissions/${value}`).then((response) => response.json()).then((permissions) => {
                    let permissionElements = "";
                    permissions.forEach((permission) => {
                        permissionElements.innerHTML = `<li>${permission.name}</li>`;
                    });
                });
            });
        </script>
    @endpush

@endsection
