@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
@endprepend
@section('content')
    @include('includes.success')
    <!-- Modal -->
    <div id="addProcessModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addProcessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="addProcessModalLabel" class="modal-title">Add New Process</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="office" class="required">Office : </label>
                        <select id="office" name="office" class="form-select">
                            <option value="" disabled selected>Select Office</option>
                            @foreach ($offices as $office)
                                <option value="{{ $office->id }}">{{ $office->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="serviceDescription" class="required">Description : </label>
                        <textarea id="serviceDescription" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="estimatedDurationDays" class="required">Estimated Duration (Days)
                                    : </label>
                                <input id="estimatedDurationDays" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="estimatedDurationHours" class="required">Estimated Duration (Hours)
                                    : </label>
                                <input id="estimatedDurationHours" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="estimatedDurationMinutes" class="required">Estimated Duration (Minutes)
                                    : </label>
                                <input id="estimatedDurationMinutes" type="number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lookFor" class="required">Person In-charge : </label>
                        <select id="lookFor" name="lookFor" class="form-select">
                            <option value="" disabled selected>Select Person In-charge</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->fullname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="secretary" class="required">Secretary : </label>
                        <select id="secretary" name="secretary" class="form-select">
                            <option value="" disabled selected>Select Secretary</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->fullname }}</option>
                            @endforeach
                        </select>
                    </div>

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
                    </div>
                    <hr>

                </div>
                <div class="modal-footer">
                    <button id="btnCloseAddProcessModal" type="button" class="btn btn-soft-secondary">Close</button>
                    <button id="btnSaveProcess" type="button" class="btn btn-soft-primary">Save Process</button>
                </div>
            </div>
        </div>
    </div>

    <div id="editProcessModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editProcessModal"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="editProcessModal" class="modal-title">Edit Process</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editOffice" class="required">Office : </label>
                        <select id="editOffice" name="editOffice" class="form-select">
                            <option value="" disabled selected>Select Office</option>
                            @foreach ($offices as $office)
                                <option value="{{ $office->id }}">{{ $office->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editServiceDescription" class="required">Description : </label>
                        <textarea id="editServiceDescription" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="editEstimatedDurationDays" class="required">Estimated Duration (Days)
                                    : </label>
                                <input id="editEstimatedDurationDays" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="editEstimatedDurationHours" class="required">Estimated Duration (Hours)
                                    : </label>
                                <input id="editEstimatedDurationHours" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="editEstimatedDurationMinutes" class="required">Estimated Duration (Minutes)
                                    : </label>
                                <input id="editEstimatedDurationMinutes" type="number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editLookFor" class="required">Person In-charge : </label>
                        <select id="editLookFor" name="editLookFor" class="form-select">
                            <option value="" disabled selected>Select Person In-charge</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->fullname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editSecretary" class="required">Secretary : </label>
                        <select id="editSecretary" name="editSecretary" class="form-select">
                            <option value="" disabled selected>Select Secretary</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->fullname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-between">
                        <label for="editRequirements">Requirements:</label>
                        <button id="edit-add-requirement" type="button" class="btn btn-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg>
                            Add Requirements
                        </button>
                    </div>

                    <div id="edit-requirements-container">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnEditCloseModal" type="button" class="btn btn-soft-secondary">Close</button>
                    <button id="btnEditSaveProcess" type="button" class="btn btn-soft-success">Save Process</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="card-title">
                    <h5 class="fw-bold">How <span class="text-lowercase">to</span> complete</h5>
                </div>
                <div>
                    <button id="btnAddNewProcess" class="btn btn-dark shadow shadow-dark align-middle">
                        <i class="mdi mdi-plus-outline me-2"></i>
                        Add New Process
                    </button>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="slimscroll activity-scroll">
                <div class="activity">
                    @foreach ($document->how_to_complete as $instruction)
                        <div class="activity-info">
                            <div class="icon-info-activity">
                                <i class="bg-soft-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                        <path
                                            d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                                    </svg>
                                </i>
                            </div>
                            <div class="activity-info-text">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="m-0">{{ $instruction?->office?->name }}</h6>
                                    <div>
                                        <button class="btn btn-soft-success btn-edit-process"
                                            data-id="{{ $instruction->id }}">Edit</button>

                                        <button class="btn btn-soft-danger btn-delete-process"
                                            data-id="{{ $instruction->id }}">Delete</button>
                                    </div>
                                </div>
                                <p class="mt-3 text-dark">
                                    <span class="text-dark">
                                        {{ $instruction->description }}
                                    </span>
                                    <br>
                                    <br>
                                    <span class="text-dark">
                                        Person In-charge :
                                        <span class="fw-bold">
                                            {{ $instruction?->person_in_charge?->fullname }}
                                        </span>
                                    </span>
                                    <br>
                                    <span class="text-dark">
                                        Secretary :
                                        <span class="fw-bold">
                                            {{ $instruction?->person_in_charge?->fullname }}
                                        </span>
                                    </span>
                                    <br>
                                    <span class="text-dark">Office Contact # :
                                        <span class="fw-bold">{{ $instruction?->office?->phone_number }}</span>
                                    </span>
                                    <br>
                                    <span class="text-dark">Office Telephone # :
                                        <span class="fw-bold">{{ $instruction?->office?->telephone_number }}</span>
                                    </span>
                                    <br>
                                    <span class="text-dark">Email :
                                        <span class="fw-bold">{{ $instruction?->office?->email }}</span>
                                    </span>
                                    <br>
                                    <span class="text-dark">Estimated Duration :
                                        <span class="fw-bold">
                                            {{ $instruction->estimated_days_to_process }} Day/s
                                            {{ $instruction->estimated_duration_hours }} Hour/s and
                                            {{ $instruction->estimated_duration_minutes }} Minute/s
                                        </span>
                                    </span>
                                    <br>
                                    <span class="text-dark mb-0">Requirements :
                                        <ul>
                                            @foreach ($instruction->requirements as $requirement)
                                                <li class="m-0 fw-bold">
                                                    {{ $requirement->description }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </span>
                                    <hr>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5 class="fw-bold">Directions</h5>
            </div>
        </div>
        <div class="card-body">
            <div id="map" style="width: 100%; height: 800px;" class="border rounded-0"></div>

        </div>
    </div>
    @push('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <script>
            let keyId = "{{ $document->id }}";
            let serviceId = null;

            let newProcessModal = document.querySelector('#addProcessModal')
            let newProcessModalInstance = bootstrap.Modal.getOrCreateInstance(newProcessModal);

            let editProcessModal = document.querySelector('#editProcessModal');
            let editProcessModalInstance = bootstrap.Modal.getOrCreateInstance(editProcessModal);

            const setServiceIdState = (id) => serviceId = id;
            const getServiceIdState = () => serviceId;

            document.querySelector('#btnAddNewProcess').addEventListener('click', () => newProcessModalInstance.show());
            document.querySelector('#btnCloseAddProcessModal').addEventListener('click', () => newProcessModalInstance.hide());

            document.addEventListener('click', (e) => {
                let target = e.target;
                if (target.classList.contains('btn-edit-process')) {
                    let keyId = target.dataset.id;
                    setServiceIdState(target.dataset.id);
                    fetch(`/document-process/${keyId}/edit`)
                        .then((response) => response.json())
                        .then((data) => {
                            document.querySelector('#editOffice').value = data.office_id;
                            document.querySelector('#editServiceDescription').value = data.description;
                            document.querySelector('#editEstimatedDurationDays').value = data
                                .estimated_days_to_process;
                            document.querySelector('#editEstimatedDurationHours').value = data
                                .estimated_duration_hours;
                            document.querySelector('#editEstimatedDurationMinutes').value = data
                                .estimated_duration_minutes;
                            document.querySelector('#editLookFor').value = data.look_for;
                            document.querySelector('#editSecretary').value = data.secretary;

                            const editRequirementsContainer = document.getElementById(
                                'edit-requirements-container');

                            // Clear existing requirement fields
                            editRequirementsContainer.innerHTML = '';

                            // Populate the edit-requirements-container with existing requirements
                            data.requirements.forEach((requirement) => {
                                const editRequirementField = document.createElement('div');
                                editRequirementField.classList.add('mb-2');

                                const editRequirementInput = document.createElement('input');
                                editRequirementInput.setAttribute('type', 'text');
                                editRequirementInput.setAttribute('name', 'editRequirements[]');
                                editRequirementInput.setAttribute('placeholder',
                                    'Enter requirement description');
                                editRequirementInput.classList.add('form-control');
                                editRequirementInput.value = requirement
                                    .description; // Populate with existing requirement

                                const editRemoveButton = document.createElement('button');
                                editRemoveButton.setAttribute('type', 'button');
                                editRemoveButton.setAttribute('tabindex', '-1');
                                editRemoveButton.classList.add('btn', 'btn-danger', 'float-end',
                                    'rounded-0');
                                editRemoveButton.textContent = 'X';

                                editRemoveButton.addEventListener('click', function() {
                                    editRequirementsContainer.removeChild(editRequirementField);
                                });

                                editRequirementField.appendChild(editRequirementInput);
                                editRequirementField.prepend(editRemoveButton);
                                editRequirementsContainer.appendChild(editRequirementField);
                            });
                            editProcessModalInstance.show();
                        });
                } else if (target.classList.contains('btn-delete-process')) {
                    setServiceIdState(target.dataset.id);
                    alertify.confirm("Are you sure you want to remove/delete this process?",
                        () => {
                            fetch(`/document-process/${getServiceIdState()}/delete`, {
                                    headers: {
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json',
                                        'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]')
                                            .getAttribute(
                                                'content')
                                    },
                                    method: "DELETE",
                                })
                                .then((res) => {
                                    return res.json();
                                })
                                .then((data) => {
                                    alert(JSON.stringify(data))
                                });
                        }).set({
                        title: 'Confirmation Dialog'
                    }).set('labels', {
                        ok: 'Yes',
                        cancel: 'No'
                    });;
                }
            });

            document.querySelector('#btnEditCloseModal').addEventListener('click', () => editProcessModalInstance.hide());

            new Choices(document.querySelector('#office'), {
                allowHTML: false,
                removeItemButton: true,
            });

            new Choices(document.querySelector('#secretary'), {
                allowHTML: false,
                removeItemButton: true,
            });

            new Choices(document.querySelector('#lookFor'), {
                allowHTML: false,
                removeItemButton: true,
            });

            document.querySelector('#btnSaveProcess').addEventListener('click', () => {
                const requirements = Array.from(document.querySelectorAll('[name="requirements[]"]')).map(input => input
                    .value);

                let data = {
                    office: document.querySelector('#office').value,
                    description: document.querySelector('#serviceDescription').value,
                    lookFor: document.querySelector('#lookFor').value,
                    secretary: document.querySelector('#secretary').value,
                    documentId: keyId,
                    estimatedDurationDays: document.querySelector('#estimatedDurationDays').value,
                    estimatedDurationHours: document.querySelector('#estimatedDurationHours').value,
                    estimatedDurationMinutes: document.querySelector('#estimatedDurationMinutes').value,
                    requirements: requirements,
                };

                fetch(`/document-process/${keyId}`, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        method: "POST",
                        body: JSON.stringify(data),
                    })
                    .then((res) => {
                        return res.json();
                    })
                    .then((data) => {
                        location.reload();
                    });
            });

            document.querySelector('#btnEditSaveProcess').addEventListener('click', () => {
                const requirements = Array.from(document.querySelectorAll('[name="editRequirements[]"]')).map(input => input
                    .value);

                let data = {
                    office: document.querySelector('#editOffice').value,
                    description: document.querySelector('#editServiceDescription').value,
                    lookFor: document.querySelector('#editLookFor').value,
                    secretary: document.querySelector('#editSecretary').value,
                    estimatedDurationDays: document.querySelector('#editEstimatedDurationDays').value,
                    estimatedDurationHours: document.querySelector('#editEstimatedDurationHours').value,
                    estimatedDurationMinutes: document.querySelector('#editEstimatedDurationMinutes').value,
                    requirements : requirements,
                };

                fetch(`/document-process/${getServiceIdState()}`, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        method: "PUT",
                        body: JSON.stringify(data),
                    })
                    .then((res) => {
                        return res.json();
                    })
                    .then((data) => {
                        location.reload();
                    });
            });
        </script>

        <script>
            let coordinates = @json($serviceCoordinates);

            let map = L.map('map', {}).setView([9.039785308062852, 126.21664534187704], 25);
            map.zoomControl.remove();
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            let waypoints = [];
            let departments = [];

            for ([department, latlng] of Object.entries(coordinates)) {
                waypoints.push(L.latLng(latlng));
                departments.push(department);
            }

            L.Routing.control({
                draggableWaypoints: false,
                waypoints: waypoints,
                createMarker: function(i, waypoint, n) {
                    let marker = L.marker(waypoint.latLng);
                    marker.bindPopup(departments[i]);
                    return marker;
                }
            }).addTo(map);
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const requirementsContainer = document.getElementById('requirements-container');
                const addRequirementButton = document.getElementById('add-requirement');

                const editRequirementsContainer = document.getElementById('edit-requirements-container');
                const editAddRequirementButton = document.getElementById('edit-add-requirement');

                addRequirementButton.addEventListener('click', function() {
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

                    removeButton.addEventListener('click', function() {
                        requirementsContainer.removeChild(requirementField);
                    });

                    requirementField.appendChild(requirementInput);
                    requirementField.prepend(removeButton);
                    requirementsContainer.appendChild(requirementField);
                });



                editAddRequirementButton.addEventListener('click', function() {
                    // Create a new requirement field
                    const editRequirementField = document.createElement('div');
                    editRequirementField.classList.add('mb-2');

                    const editRequirementInput = document.createElement('input');
                    editRequirementInput.setAttribute('type', 'text');
                    editRequirementInput.setAttribute('name',
                        'editRequirements[]'); // Use a different name for edit
                    editRequirementInput.setAttribute('placeholder', 'Enter requirement description');
                    editRequirementInput.classList.add('form-control');

                    const editRemoveButton = document.createElement('button');
                    editRemoveButton.setAttribute('type', 'button');
                    editRemoveButton.setAttribute('tabindex', '-1');
                    editRemoveButton.classList.add('btn', 'btn-danger', 'float-end', 'rounded-0');
                    editRemoveButton.textContent = 'X';

                    editRemoveButton.addEventListener('click', function() {
                        editRequirementsContainer.removeChild(editRequirementField);
                    });

                    editRequirementField.appendChild(editRequirementInput);
                    editRequirementField.prepend(editRemoveButton);
                    editRequirementsContainer.appendChild(editRequirementField);
                });
            });
        </script>
    @endpush
@endsection
