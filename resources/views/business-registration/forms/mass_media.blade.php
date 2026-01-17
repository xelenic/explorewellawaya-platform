<div class="form-section" id="mass_mediaSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Mass Media Registration</h2>
    
    <div class="form-group">
        <label class="form-label" for="mm_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="mm_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="mm_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="mm_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="mm_types">Types (comma-separated)</label>
        <input type="text" class="form-control" id="mm_types" name="types" value="{{ old('types') }}" placeholder="TV, Radio, Newspaper, Magazine, Online">
        <small class="form-help">Enter media types separated by commas</small>
    </div>

    <div class="form-group">
        <label class="form-label" for="mm_registration_number">Registration Number</label>
        <input type="text" class="form-control" id="mm_registration_number" name="registration_number" value="{{ old('registration_number') }}">
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="mm_email">Contact Email</label>
            <input type="email" class="form-control" id="mm_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="mm_phone">Contact Phone</label>
            <input type="text" class="form-control" id="mm_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

