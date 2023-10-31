@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endprepend
@section('content')
    @include('includes.success')
    <div class="card">
        <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <div class="card-title text-white">
                Add New Office
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('office.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="map" class="required">Location</label>
                    @error('location')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div id="map" style="width: 100%; height: 400px;"
                        class="border rounded @error('location') border-danger @enderror"></div>
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
                    <label for="code" class="required">Code</label>
                    <input id="code" type="text" name="code" value="{{ old('code') }}"
                        class="form-control @error('code') is-invalid @enderror">
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group d-none">
                    <label>
                        <input type="hidden" readonly class="form-control" name="location">
                    </label>
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
                    <label for="campus_id" class="required">Campus</label>
                    <select id="campus_id" name="campus_id" class="form-control @error('campus_id') is-invalid @enderror">
                        @foreach ($campuses as $campus)
                            <option value="{{ $campus->id }}" {{ old('campus_id') == $campus->id ? 'selected' : '' }}>
                                {{ $campus->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('campus_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="telephone_number">Telephone Number</label>
                    <input id="telephone_number" type="text" name="telephone_number"
                        value="{{ old('telephone_number') }}"
                        class="form-control @error('telephone_number') is-invalid @enderror">
                    @error('telephone_number')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}"
                        class="form-control @error('phone_number') is-invalid @enderror">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
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
    @push('page-scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            // Initialize the map
            let map = L.map('map').setView([9.039785308062852, 126.21664534187704], 25);

            // Add the OpenStreetMap tile layer to the map
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            let marker = null;

            // Function to handle click events on the map
            function onMapClick(e) {
                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker(e.latlng, {
                    draggable: true
                }).addTo(map);
                document.querySelector('[name="location"]').value = JSON.stringify({
                    lat: e.latlng.lat,
                    lng: e.latlng.lng
                });
            }

            // Register the click event listener on the map
            map.on('click', onMapClick);
        </script>
    @endpush
@endsection
