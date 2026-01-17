@extends('admin.layout')

@section('title', 'Edit Destination')
@section('page-title', 'Edit Destination')

@section('content')
<div class="page-header">
    <h1>Edit Destination</h1>
    <div class="breadcrumb"><a href="{{ route('admin.destinations.index') }}">Destinations</a> / Edit</div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Destination Information</h3>
    </div>
    <form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $destination->name) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $destination->slug) }}" placeholder="auto-generated if left empty">
            <small style="color: var(--text-light);">URL-friendly version of the name. Leave empty to auto-generate.</small>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="location">Location *</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $destination->location) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="category">Category *</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $destination->category) }}" placeholder="e.g., Nature, Cultural, Adventure" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="description">Description *</label>
            <textarea class="form-control" id="description" name="description" rows="10" required>{{ old('description', $destination->description) }}</textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="featured_image_file">Featured Image</label>
            <input type="file" class="form-control" id="featured_image_file" name="featured_image_file" accept="image/*" onchange="previewImage(this)">
            <small style="color: var(--text-light);">Upload an image file (JPEG, PNG, JPG, GIF, WebP - Max 5MB)</small>
            @if($destination->featured_image)
                <div style="margin-top: 1rem;">
                    <p style="color: var(--text-light); margin-bottom: 0.5rem;">Current Image:</p>
                    <img src="{{ $destination->featured_image }}" alt="Current featured image" style="max-width: 300px; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color);">
                </div>
            @endif
            <div id="imagePreview" style="margin-top: 1rem; display: none;">
                <p style="color: var(--text-light); margin-bottom: 0.5rem;">New Image Preview:</p>
                <img id="previewImg" src="" alt="Preview" style="max-width: 300px; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color);">
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="featured_image">Or Featured Image URL</label>
            <input type="url" class="form-control" id="featured_image" name="featured_image" value="{{ old('featured_image', $destination->featured_image) }}" placeholder="https://example.com/image.jpg">
            <small style="color: var(--text-light);">Alternatively, provide a URL to an image. File upload takes priority if both are provided.</small>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="images">Additional Images (comma-separated URLs)</label>
            <input type="text" class="form-control" id="images" name="images" value="{{ old('images', is_array($destination->images) ? implode(', ', $destination->images) : '') }}" placeholder="https://example.com/img1.jpg, https://example.com/img2.jpg">
            <small style="color: var(--text-light);">Comma-separated list of image URLs.</small>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="highlights">Highlights</label>
            <textarea class="form-control" id="highlights" name="highlights" rows="5" placeholder="Key features or attractions">{{ old('highlights', $destination->highlights) }}</textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="best_time_to_visit">Best Time to Visit</label>
            <input type="text" class="form-control" id="best_time_to_visit" name="best_time_to_visit" value="{{ old('best_time_to_visit', $destination->best_time_to_visit) }}" placeholder="e.g., December to February">
        </div>
        
        <div class="form-group">
            <label class="form-label" for="how_to_reach">How to Reach</label>
            <textarea class="form-control" id="how_to_reach" name="how_to_reach" rows="5" placeholder="Transportation options and directions">{{ old('how_to_reach', $destination->how_to_reach) }}</textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="tips">Tips</label>
            <textarea class="form-control" id="tips" name="tips" rows="4" placeholder="Travel tips and recommendations">{{ old('tips', $destination->tips) }}</textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Location on Map</label>
            <div id="map" style="height: 400px; width: 100%; border-radius: 8px; border: 2px solid var(--border-color); margin-bottom: 1rem;"></div>
            <small style="color: var(--text-light);">Click on the map to set the location coordinates. You can also drag the marker to adjust the position.</small>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
            <div class="form-group">
                <label class="form-label" for="latitude">Latitude</label>
                <input type="number" step="any" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $destination->latitude) }}" placeholder="-90 to 90">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="longitude">Longitude</label>
                <input type="number" step="any" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $destination->longitude) }}" placeholder="-180 to 180">
            </div>
        </div>
        
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $destination->is_published) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Publish this destination</label>
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="published_at">Published At</label>
            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $destination->published_at ? $destination->published_at->format('Y-m-d\TH:i') : '') }}">
            <small style="color: var(--text-light);">Leave empty to use current date/time when published.</small>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Destination
            </button>
            <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const slugInput = document.getElementById('slug');
        if (!slugInput.value || slugInput.dataset.autoGenerated === 'true') {
            const name = this.value;
            const slug = name.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });

    // Stop auto-generation if user manually edits slug
    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.autoGenerated = 'false';
    });

    // Initialize map
    let map, marker;
    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');
    const locationInput = document.getElementById('location');
    
    // Default center (Wellawaya, Sri Lanka) or use existing coordinates
    const existingLat = {{ old('latitude', $destination->latitude ?? 6.7300) }};
    const existingLng = {{ old('longitude', $destination->longitude ?? 81.1025) }};
    
    // Initialize map
    map = L.map('map').setView([existingLat, existingLng], existingLat && existingLng ? 15 : 13);
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);
    
    // Create marker
    const initialLat = latInput.value ? parseFloat(latInput.value) : existingLat;
    const initialLng = lngInput.value ? parseFloat(lngInput.value) : existingLng;
    
    marker = L.marker([initialLat, initialLng], { draggable: true }).addTo(map);
    
    // Update coordinates when marker is dragged
    marker.on('dragend', function(e) {
        const position = marker.getLatLng();
        latInput.value = position.lat.toFixed(6);
        lngInput.value = position.lng.toFixed(6);
        updateLocationFromCoordinates(position.lat, position.lng);
    });
    
    // Update marker when map is clicked
    map.on('click', function(e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;
        
        marker.setLatLng([lat, lng]);
        latInput.value = lat.toFixed(6);
        lngInput.value = lng.toFixed(6);
        updateLocationFromCoordinates(lat, lng);
    });
    
    // Update map when coordinates are manually entered
    latInput.addEventListener('change', updateMapFromInputs);
    lngInput.addEventListener('change', updateMapFromInputs);
    
    function updateMapFromInputs() {
        const lat = parseFloat(latInput.value);
        const lng = parseFloat(lngInput.value);
        
        if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
            marker.setLatLng([lat, lng]);
            map.setView([lat, lng], map.getZoom());
            updateLocationFromCoordinates(lat, lng);
        }
    }
    
    // Reverse geocoding to get location name
    function updateLocationFromCoordinates(lat, lng) {
        if (!locationInput.value || locationInput.dataset.autoFilled === 'true') {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.address) {
                        const address = data.address;
                        let locationName = '';
                        
                        // Try to get a meaningful location name
                        if (address.city || address.town || address.village) {
                            locationName = address.city || address.town || address.village;
                            if (address.state) {
                                locationName += ', ' + address.state;
                            }
                        } else if (address.state) {
                            locationName = address.state;
                        } else if (address.country) {
                            locationName = address.country;
                        }
                        
                        if (locationName) {
                            locationInput.value = locationName;
                            locationInput.dataset.autoFilled = 'true';
                        }
                    }
                })
                .catch(error => {
                    console.log('Geocoding error:', error);
                });
        }
    }
    
    // Stop auto-filling if user manually edits location
    locationInput.addEventListener('input', function() {
        this.dataset.autoFilled = 'false';
    });
    
    // Initialize location if coordinates exist
    if (latInput.value && lngInput.value) {
        updateMapFromInputs();
    }

    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
@endpush
@endsection

