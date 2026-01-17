@extends('admin.layout')

@section('title', 'Permission Details')
@section('page-title', 'Permission Details')

@section('content')
<div class="page-header">
    <h1>Permission Details: {{ $permission->name }}</h1>
    <div class="breadcrumb"><a href="{{ route('admin.permissions.index') }}">Permissions</a> / View</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>Permission Information</h3>
        <div class="actions">
            <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
    
    <div style="padding: 1.5rem;">
        <div style="margin-bottom: 1.5rem;">
            <strong>ID:</strong> {{ $permission->id }}
        </div>
        <div style="margin-bottom: 1.5rem;">
            <strong>Name:</strong> {{ $permission->name }}
        </div>
    </div>
</div>

<div style="margin-top: 1.5rem;">
    <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Permissions
    </a>
</div>
@endsection


