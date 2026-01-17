<div class="form-section" id="innovationSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Innovation Registration</h2>
    
    @include('business-registration.partials.account_fields')
    
    <div class="form-group">
        <label class="form-label" for="inv_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="inv_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="inv_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="inv_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="inv_innovation_type">Innovation Type <span class="required">*</span></label>
        <input type="text" class="form-control" id="inv_innovation_type" name="innovation_type" value="{{ old('innovation_type') }}" placeholder="Technology, Agriculture, Education" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="inv_best_achievements">Best Achievements</label>
        <textarea class="form-control" id="inv_best_achievements" name="best_achievements">{{ old('best_achievements') }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="inv_email">Contact Email</label>
            <input type="email" class="form-control" id="inv_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="inv_phone">Contact Phone</label>
            <input type="text" class="form-control" id="inv_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

