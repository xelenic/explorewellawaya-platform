<div class="form-section" id="social_media_activistSection">
    <h2 style="margin-bottom: 1.5rem; color: var(--primary-color);">Social Media Activist Registration</h2>
    
    @include('business-registration.partials.account_fields')
    
    <div class="form-group">
        <label class="form-label" for="sma_name">Name <span class="required">*</span></label>
        <input type="text" class="form-control" id="sma_name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label class="form-label" for="sma_address">Address <span class="required">*</span></label>
        <textarea class="form-control" id="sma_address" name="address" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label" for="sma_page_names">Page Names (comma-separated)</label>
        <input type="text" class="form-control" id="sma_page_names" name="page_names" value="{{ old('page_names') }}" placeholder="My Travel Blog, Explore Sri Lanka">
        <small class="form-help">Enter page/social media account names separated by commas</small>
    </div>

    <div class="form-group">
        <label class="form-label" for="sma_links">Links (comma-separated URLs)</label>
        <input type="text" class="form-control" id="sma_links" name="links" value="{{ old('links') }}" placeholder="https://facebook.com/page, https://instagram.com/page">
        <small class="form-help">Enter social media links separated by commas</small>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="sma_email">Contact Email</label>
            <input type="email" class="form-control" id="sma_email" name="contact_email" value="{{ old('contact_email') }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="sma_phone">Contact Phone</label>
            <input type="text" class="form-control" id="sma_phone" name="contact_phone" value="{{ old('contact_phone') }}">
        </div>
    </div>

    <div class="form-actions">
        <button type="button" class="btn btn-secondary" onclick="goBack()">Back</button>
        <button type="submit" class="btn btn-primary">Submit Registration</button>
    </div>
</div>

