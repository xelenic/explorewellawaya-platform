<div class="form-section" id="guideSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Guide Registration</h2>
    
    <div class="form-group">
        <label class="form-label" for="guide_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="guide_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="guide_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="guide_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="guide_gender">Gender <span class="required">*</span></label>
            <select class="form-control" id="guide_gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="licence_number">Licence Number <span class="required">*</span></label>
            <input type="text" class="form-control" id="licence_number" name="licence_number" value="{{ old('licence_number') }}" required>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="work_experience">Work Experience</label>
        <textarea class="form-control" id="work_experience" name="work_experience">{{ old('work_experience') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="special_achievements">Special Achievements</label>
        <textarea class="form-control" id="special_achievements" name="special_achievements">{{ old('special_achievements') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="language_skills">Language Skills (comma-separated)</label>
        <input type="text" class="form-control" id="language_skills" name="language_skills" value="{{ old('language_skills') }}" placeholder="English, Sinhala, Tamil">
        <small class="form-help">Enter languages separated by commas</small>
    </div>

    <div class="form-group">
        <label class="form-label" for="approved_locations">Approved Locations (comma-separated)</label>
        <input type="text" class="form-control" id="approved_locations" name="approved_locations" value="{{ old('approved_locations') }}" placeholder="Wellawaya, Ella, Bandarawela">
        <small class="form-help">Enter locations separated by commas</small>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="guide_email">Contact Email</label>
            <input type="email" class="form-control" id="guide_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="guide_phone">Contact Phone</label>
            <input type="text" class="form-control" id="guide_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

