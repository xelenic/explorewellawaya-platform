@extends('admin.layout')

@section('title', 'Permissions')
@section('page-title', 'Permissions Management')

@section('content')
<div class="page-header">
    <h1>Permissions Management</h1>
    <div class="breadcrumb">Manage system permissions</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>All Permissions</h3>
        <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Permission
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td><strong>{{ $permission->name }}</strong></td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.permissions.show', $permission) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: var(--text-light); padding: 2rem;">
                        No permissions found. <a href="{{ route('admin.permissions.create') }}">Create the first permission</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($permissions->hasPages())
        <div style="padding: 1rem; border-top: 1px solid var(--border-color);">
            {{ $permissions->links() }}
        </div>
    @endif
</div>
@endsection


