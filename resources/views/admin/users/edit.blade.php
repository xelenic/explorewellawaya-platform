@extends('admin.layout')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('content')
<div class="page-header">
    <h1>Edit User: {{ $user->name }}</h1>
    <div class="breadcrumb"><a href="{{ route('admin.users.index') }}">Users</a> / Edit</div>
</div>

<div class="card">
    <div class="card-header">
        <h3>User Information</h3>
    </div>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="name">Name *</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="email">Email *</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="password">Password (leave blank to keep current)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        
        <div class="form-group">
            <label class="form-label">Roles</label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update User
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection


