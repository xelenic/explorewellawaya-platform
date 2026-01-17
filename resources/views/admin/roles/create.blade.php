@extends('admin.layout')

@section('title', 'Create Role')
@section('page-title', 'Create New Role')

@section('content')
<div class="page-header">
    <h1>Create New Role</h1>
    <div class="breadcrumb"><a href="{{ route('admin.roles.index') }}">Roles</a> / Create</div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Role Information</h3>
    </div>
    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label" for="name">Role Name *</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            <small style="color: var(--text-light);">e.g., editor, moderator, manager</small>
        </div>
        
        <div class="form-group">
            <label class="form-label">Permissions</label>
            <div style="max-height: 400px; overflow-y: auto; border: 1px solid var(--border-color); border-radius: 6px; padding: 1rem;">
                @if(isset($permissions['web']))
                    @foreach($permissions['web'] as $permission)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                @else
                    @foreach($permissions->flatten() as $permission)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="permission_{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Create Role
            </button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>
@endsection


