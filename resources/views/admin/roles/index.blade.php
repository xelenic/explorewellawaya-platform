@extends('admin.layout')

@section('title', 'Roles')
@section('page-title', 'Roles Management')

@section('content')
<div class="page-header">
    <h1>Roles Management</h1>
    <div class="breadcrumb">Manage roles and permissions</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>All Roles</h3>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Role
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td><strong>{{ $role->name }}</strong></td>
                    <td>
                        @forelse($role->permissions as $permission)
                            <span class="badge badge-success" style="margin-right: 0.25rem;">{{ $permission->name }}</span>
                        @empty
                            <span style="color: var(--text-light);">No permissions</span>
                        @endforelse
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            @if($role->name !== 'admin')
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: var(--text-light); padding: 2rem;">
                        No roles found. <a href="{{ route('admin.roles.create') }}">Create the first role</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($roles->hasPages())
        <div style="padding: 1rem; border-top: 1px solid var(--border-color);">
            {{ $roles->links() }}
        </div>
    @endif
</div>
@endsection


