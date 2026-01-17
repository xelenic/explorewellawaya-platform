@extends('admin.layout')

@section('title', 'Users')
@section('page-title', 'Users Management')

@section('content')
<div class="page-header">
    <h1>Users Management</h1>
    <div class="breadcrumb">Manage all users and their roles</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>All Users</h3>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New User
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @forelse($user->roles as $role)
                            <span class="badge badge-primary">{{ $role->name }}</span>
                        @empty
                            <span style="color: var(--text-light);">No roles</span>
                        @endforelse
                    </td>
                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: var(--text-light); padding: 2rem;">
                        No users found. <a href="{{ route('admin.users.create') }}">Create the first user</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($users->hasPages())
        <div style="padding: 1rem; border-top: 1px solid var(--border-color);">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection


