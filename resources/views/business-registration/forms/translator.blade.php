<div class="form-section" id="translatorSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Translator Registration</h2>
    
    <div class="form-group">
        <label class="form-label" for="trans_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="trans_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="trans_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="trans_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="trans_language_skills">Language Skills (comma-separated)</label>
        <input type="text" class="form-control" id="trans_language_skills" name="language_skills" value="{{ old('language_skills') }}" placeholder="English, Sinhala, Tamil, French">
        <small class="form-help">Enter languages separated by commas</small>
    </div>

    <div class="form-group">
        <label class="form-label" for="trans_work_experience">Work Experience</label>
        <textarea class="form-control" id="trans_work_experience" name="work_experience">{{ old('work_experience') }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="trans_email">Contact Email</label>
            <input type="email" class="form-control" id="trans_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="trans_phone">Contact Phone</label>
            <input type="text" class="form-control" id="trans_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

