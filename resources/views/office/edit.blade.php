@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
@endprepend
@section('content')
    @include('includes.success')
    <div class="card shadow-sm rounded-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">
                Edit Office
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('office.update', $office) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="required">Name</label>
                    <input id="name" type="text" name="name" value="{{ $office->name }}"
                           class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="map" class="required">Location</label>
                    @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                    <div id="map" style="width: 100%; height: 400px;"
                         class="border rounded @error('location') border-danger @enderror"></div>
                </div>

                <div class="form-group d-none">
                    <label>
                        <input type="text" readonly class="form-control" name="location"
                               value="{{ $office->location }}">
                    </label>
                </div>

                <div class="form-group">
                    <label for="description" class="required">Description</label>
                    <textarea name="description" id="description" cols="30" rows="3"
                              class="form-control @error('description') is-invalid @enderror">{{ $office->description }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telephone_number">Telephone Number</label>
                    <input id="telephone_number" type="text" name="telephone_number"
                           value="{{ $office->telephone_number }}"
                           class="form-control @error('telephone_number') is-invalid @enderror">
                    @error('telephone_number')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input id="phone_number" type="text" name="phone_number"
                           value="{{ $office->phone_number }}"
                           class="form-control @error('phone_number') is-invalid @enderror">
                    @error('phone_number')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input id="email" type="email" name="email"
                           value="{{ $office->email }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="text-end mt-3">
                    <input type="submit" class="btn btn-soft-success" value="Update">
                </div>
            </form>
        </div>
    </div>
    @push('page-scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
                crossorigin=""></script>
        <script>
            let coordinates = @json($office->location);

            // Initialize the map
            let map = L.map('map', {
            }).setView([9.039785308062852, 126.21664534187704], 25);

            // Add the OpenStreetMap tile layer to the map
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            let marker = null;
            let {lat, lng} = JSON.parse(coordinates);

            marker = L.marker([lat, lng], {draggable: true}).addTo(map);

            // Function to handle click events on the map
            function onMapClick(e) {
                if (marker) {
                    map.removeLayer(marker);
                }

                marker = L.marker(e.latlng, {draggable: true}).addTo(map);
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
