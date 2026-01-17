<div class="form-section" id="restaurantSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Restaurant Registration</h2>
    
    @include('business-registration.partials.account_fields')
    
    <div class="form-group">
        <label class="form-label" for="rest_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="rest_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="rest_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="rest_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="rest_restaurant_name">Restaurant Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="rest_restaurant_name" name="restaurant_name" value="{{ old('restaurant_name') }}" required>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="rest_registration_number">Registration Number</label>
            <input type="text" class="form-control" id="rest_registration_number" name="registration_number" value="{{ old('registration_number') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="rest_location">Location <span class="required">*</span></label>
            <input type="text" class="form-control" id="rest_location" name="location" value="{{ old('location') }}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="rest_employees">Number of Employees</label>
        <input type="number" class="form-control" id="rest_employees" name="employees" value="{{ old('employees') }}" min="0">
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="rest_email">Contact Email</label>
            <input type="email" class="form-control" id="rest_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="rest_phone">Contact Phone</label>
            <input type="text" class="form-control" id="rest_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

