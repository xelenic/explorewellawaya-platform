<div class="form-section" id="hotelSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Hotel Registration</h2>
    
    @include('business-registration.partials.account_fields')
    
    <div class="form-group">
        <label class="form-label" for="hotel_name">Hotel Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="hotel_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="hotel_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="hotel_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="hotel_type">Hotel Type <span class="required">*</span></label>
            <select class="form-control" id="hotel_type" name="hotel_type" required>
                <option value="">Select Type</option>
                <option value="Luxury">Luxury</option>
                <option value="Budget">Budget</option>
                <option value="Resort">Resort</option>
                <option value="Boutique">Boutique</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="room_qty">Room Quantity <span class="required">*</span></label>
            <input type="number" class="form-control" id="room_qty" name="room_qty" value="{{ old('room_qty') }}" min="1" required>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="hotel_location">Location <span class="required">*</span></label>
        <input type="text" class="form-control" id="hotel_location" name="location" value="{{ old('location') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label">Amenities</label>
        <div class="form-check">
            <input type="checkbox" id="ac_available" name="ac_available" value="1" {{ old('ac_available') ? 'checked' : '' }}>
            <label for="ac_available">Air Conditioning Available</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="bar_available" name="bar_available" value="1" {{ old('bar_available') ? 'checked' : '' }}>
            <label for="bar_available">Bar Available</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="swimming_pool_available" name="swimming_pool_available" value="1" {{ old('swimming_pool_available') ? 'checked' : '' }}>
            <label for="swimming_pool_available">Swimming Pool Available</label>
        </div>
        <div class="form-check">
            <input type="checkbox" id="tourist_board_approved" name="tourist_board_approved" value="1" {{ old('tourist_board_approved') ? 'checked' : '' }}>
            <label for="tourist_board_approved">Tourist Board Approved</label>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="hotel_images">Images (comma-separated URLs)</label>
        <input type="text" class="form-control" id="hotel_images" name="images" value="{{ old('images') }}" placeholder="https://example.com/image1.jpg, https://example.com/image2.jpg">
        <small class="form-help">Enter image URLs separated by commas</small>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="hotel_email">Contact Email</label>
            <input type="email" class="form-control" id="hotel_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="hotel_phone">Contact Phone</label>
            <input type="text" class="form-control" id="hotel_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

