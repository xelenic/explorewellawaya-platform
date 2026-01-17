<div class="form-section" id="passenger_transportSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Passenger Transport Registration</h2>
    
    @include('business-registration.partials.account_fields')
    
    <div class="form-group">
        <label class="form-label" for="pt_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="pt_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="pt_vehicle_type">Vehicle Type <span class="required">*</span></label>
        <input type="text" class="form-control" id="pt_vehicle_type" name="vehicle_type" value="{{ old('vehicle_type') }}" placeholder="Car, Van, Bus, Tuk-tuk" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="pt_registration_number">Registration Number <span class="required">*</span></label>
        <input type="text" class="form-control" id="pt_registration_number" name="registration_number" value="{{ old('registration_number') }}" required>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="pt_email">Contact Email</label>
            <input type="email" class="form-control" id="pt_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="pt_phone">Contact Phone</label>
            <input type="text" class="form-control" id="pt_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

