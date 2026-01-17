<div class="form-section" id="experience_providerSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Experience Provider Registration</h2>
    
    @include('business-registration.partials.account_fields')
    
    <div class="form-group">
        <label class="form-label" for="ep_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="ep_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="ep_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="ep_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="ep_registration_number">Registration Number</label>
        <input type="text" class="form-control" id="ep_registration_number" name="registration_number" value="{{ old('registration_number') }}">
    </div>

    <div class="form-group">
        <label class="form-label" for="ep_types_of_experience">Types of Experience (comma-separated)</label>
        <input type="text" class="form-control" id="ep_types_of_experience" name="types_of_experience" value="{{ old('types_of_experience') }}" placeholder="Adventure, Cultural, Nature, Culinary">
        <small class="form-help">Enter experience types separated by commas</small>
    </div>

    <div class="form-group">
        <label class="form-label" for="ep_work_experience">Work Experience</label>
        <textarea class="form-control" id="ep_work_experience" name="work_experience">{{ old('work_experience') }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="ep_email">Contact Email</label>
            <input type="email" class="form-control" id="ep_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="ep_phone">Contact Phone</label>
            <input type="text" class="form-control" id="ep_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

