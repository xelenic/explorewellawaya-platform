@extends('admin.layout')

@section('title', 'Create User')
@section('page-title', 'Create New User')

@section('content')
<div class="page-header">
    <h1>Create New User</h1>
    <div class="breadcrumb"><a href="{{ route('admin.users.index') }}">Users</a> / Create</div>
</div>

<div class="card">
    <div class="card-header">
        <h3>User Information</h3>
    </div>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="password">Password *</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirm Password *</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        
        <div class="form-group">
            <label class="form-label">Roles</label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                    <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Create User
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection


