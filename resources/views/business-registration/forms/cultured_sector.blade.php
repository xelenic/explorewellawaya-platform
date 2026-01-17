<div class="form-section" id="cultured_sectorSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Cultured Sector Registration</h2>
    
    <div class="form-group">
        <label class="form-label" for="cs_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="cs_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="cs_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="cs_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="cs_institution_name">Institution Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="cs_institution_name" name="institution_name" value="{{ old('institution_name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="cs_type">Type <span class="required">*</span></label>
        <input type="text" class="form-control" id="cs_type" name="type" value="{{ old('type') }}" placeholder="Dance, Music, Theater, Art" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="cs_achievements">Achievements</label>
        <textarea class="form-control" id="cs_achievements" name="achievements">{{ old('achievements') }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="cs_email">Contact Email</label>
            <input type="email" class="form-control" id="cs_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="cs_phone">Contact Phone</label>
            <input type="text" class="form-control" id="cs_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

