<div class="form-section" id="travel_agencySection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Travel Agency Registration</h2>
    
    @include('business-registration.partials.account_fields')
    
    <div class="form-group">
        <label class="form-label" for="ta_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="ta_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="ta_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="ta_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="ta_registration_number">Registration Number <span class="required">*</span></label>
        <input type="text" class="form-control" id="ta_registration_number" name="registration_number" value="{{ old('registration_number') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="ta_vehicles">Vehicles (comma-separated)</label>
        <input type="text" class="form-control" id="ta_vehicles" name="vehicles" value="{{ old('vehicles') }}" placeholder="Car, Van, Bus">
        <small class="form-help">Enter vehicle types separated by commas</small>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="ta_email">Contact Email</label>
            <input type="email" class="form-control" id="ta_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="ta_phone">Contact Phone</label>
            <input type="text" class="form-control" id="ta_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

