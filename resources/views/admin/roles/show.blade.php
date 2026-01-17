@extends('admin.layout')

@section('title', 'Role Details')
@section('page-title', 'Role Details')

@section('content')
<div class="page-header">
    <h1>Role Details: {{ $role->name }}</h1>
    <div class="breadcrumb"><a href="{{ route('admin.roles.index') }}">Roles</a> / View</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Role Information</h3>
        <div class="actions">
            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
    
    <div style="padding: 1.5rem;">
        <div style="margin-bottom: 1.5rem;">
            <strong>ID:</strong> {{ $role->id }}
        </div>
        <div style="margin-bottom: 1.5rem;">
            <strong>Name:</strong> {{ $role->name }}
        </div>
        
        <div style="margin-top: 2rem;">
            <strong>Permissions ({{ $role->permissions->count() }}):</strong>
            <div style="margin-top: 0.5rem;">
                @forelse($role->permissions as $permission)
                    <span class="badge badge-success" style="margin-right: 0.5rem; margin-bottom: 0.5rem;">{{ $permission->name }}</span>
                @empty
                    <span style="color: var(--text-light);">No permissions assigned</span>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 1.5rem;">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Roles
    </a>
</div>
@endsection


