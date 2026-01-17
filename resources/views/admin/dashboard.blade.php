@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1>Dashboard</h1>
    <div class="breadcrumb">Welcome back, {{ auth()->user()->name }}!</div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-label">Total Users</div>
                <div class="stat-card-value">{{ $stats['total_users'] }}</div>
            </div>
            <div class="stat-card-icon" style="background: #3498db;">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-label">Admin Users</div>
                <div class="stat-card-value">{{ $stats['admin_users'] }}</div>
            </div>
            <div class="stat-card-icon" style="background: #e74c3c;">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-label">Total Roles</div>
                <div class="stat-card-value">{{ $stats['total_roles'] }}</div>
            </div>
            <div class="stat-card-icon" style="background: #9b59b6;">
                <i class="fas fa-user-tag"></i>
            </div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-label">Total Permissions</div>
                <div class="stat-card-value">{{ $stats['total_permissions'] }}</div>
            </div>
            <div class="stat-card-icon" style="background: #f39c12;">
                <i class="fas fa-key"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Recent Users</h3>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recent_users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge badge-primary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: var(--text-light);">
                        No users found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection


