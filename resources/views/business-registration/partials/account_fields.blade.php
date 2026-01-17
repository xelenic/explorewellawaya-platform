<div class="form-group" style="border-top: 2px solid var(--border-color); padding-top: 1.5rem; margin-top: 1.5rem;">
    <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Account Information</h3>
    <p class="form-help" style="margin-bottom: 1rem;">Create your login credentials to access your business account</p>
    
    <div class="form-row">
        <div class="form-group">
            <label class="form-label" for="account_email">Email Address <span class="required">*</span></label>
            <input type="email" class="form-control" id="account_email" name="email" value="{{ old('email') }}" required>
            <small class="form-help">This will be used to log into your account</small>
        </div>
        <div class="form-group">
            <label class="form-label" for="account_password">Password <span class="required">*</span></label>
            <input type="password" class="form-control" id="account_password" name="password" required minlength="8">
            <small class="form-help">Minimum 8 characters</small>
        </div>
    </div>
    
    <div class="form-group">
        <label class="form-label" for="account_password_confirmation">Confirm Password <span class="required">*</span></label>
        <input type="password" class="form-control" id="account_password_confirmation" name="password_confirmation" required minlength="8">
    </div>
</div>

