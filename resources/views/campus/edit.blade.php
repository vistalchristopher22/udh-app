@extends('layouts.app')
@section('page-title', '')
@prepend('page-css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endprepend
@section('content')
    @include('includes.success')
    <div class="card rounded-0 shadow">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <div class="card-title">
                Edit Campus
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('campus.update', $campus->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="required">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $campus->name) }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="required">Description</label>
                    <textarea id="description" name="description" cols="30" rows="3"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $campus->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="map" class="required">Location</label>
                    <div id="map" style="width: 100%; height: 400px;"
                        class="border rounded @error('location') border-danger @enderror"></div>
                    @error('location')
                        <span class="text-danger text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>
                        <input type="hidden" class="form-control @error('location') is-invalid @enderror" name="location"
                            value="{{ old('location', $campus->location) }}">
                    </label>
                </div>

                <div class="text-end mt-3">
                    <input type="submit" class="btn btn-soft-success" value="Update">
                </div>
            </form>
        </div>
    </div>
    @push('page-scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <script>
            let coordinates = @json($campus->location);

            // Initialize the map
            let map = L.map('map', {}).setView([9.039785308062852, 126.21664534187704], 25);

            // Add the OpenStreetMap tile layer to the map
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            let marker = null;
            let {
                lat,
                lng
            } = JSON.parse(coordinates);

            marker = L.marker([lat, lng], {
                draggable: true
            }).addTo(map);

            // Function to handle click events on the map
            function onMapClick(e) {
                marker = L.marker(e.latlng, {
                    draggable: true
                }).addTo(map);
                document.querySelector('[name="location"]').value = JSON.stringify({
                    lat: e.latlng.lat,
                    lng: e.latlng.lng
                });

                if (marker) {
                    map.removeLayer(marker);
                }
            }

            // Function to handle dragend event on the marker
            function onMarkerDragEnd(e) {
                document.querySelector('[name="location"]').value = JSON.stringify({
                    lat: e.target._latlng.lat,
                    lng: e.target._latlng.lng
                });
            }

            // Register the click event listener on the map
            map.on('click', onMapClick);

            // Register the dragend event listener on the marker
            marker.on('dragend', onMarkerDragEnd);
        </script>
    @endpush
@endsection
