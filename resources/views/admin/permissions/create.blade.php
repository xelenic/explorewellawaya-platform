@extends('admin.layout')

@section('title', 'Create Permission')
@section('page-title', 'Create New Permission')

@section('content')
<div class="page-header">
    <h1>Create New Permission</h1>
    <div class="breadcrumb"><a href="{{ route('admin.permissions.index') }}">Permissions</a> / Create</div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Permission Information</h3>
    </div>
    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="name">Permission Name *</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            <small style="color: var(--text-light);">e.g., edit posts, delete users, manage settings</small>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Create Permission
            </button>
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection


