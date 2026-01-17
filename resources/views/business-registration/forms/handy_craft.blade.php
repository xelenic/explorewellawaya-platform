<div class="form-section" id="handy_craftSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Handy Craft Registration</h2>
    
    <div class="form-group">
        <label class="form-label" for="hc_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="hc_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="hc_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="hc_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="hc_business_registration_number">Business Registration Number</label>
        <input type="text" class="form-control" id="hc_business_registration_number" name="business_registration_number" value="{{ old('business_registration_number') }}">
    </div>

    <div class="form-group">
        <label class="form-label" for="hc_items">Items (comma-separated)</label>
        <input type="text" class="form-control" id="hc_items" name="items" value="{{ old('items') }}" placeholder="Wooden crafts, Pottery, Handwoven items">
        <small class="form-help">Enter items/products separated by commas</small>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="hc_email">Contact Email</label>
            <input type="email" class="form-control" id="hc_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="hc_phone">Contact Phone</label>
            <input type="text" class="form-control" id="hc_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

