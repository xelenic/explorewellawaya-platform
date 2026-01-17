@extends('admin.layout')

@section('title', 'Edit Permission')
@section('page-title', 'Edit Permission')

@section('content')
<div class="page-header">
    <h1>Edit Permission: {{ $permission->name }}</h1>
    <div class="breadcrumb"><a href="{{ route('admin.permissions.index') }}">Permissions</a> / Edit</div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Permission Information</h3>
    </div>
    <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="name">Permission Name *</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $permission->name) }}" required>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Permission
            </button>
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection


