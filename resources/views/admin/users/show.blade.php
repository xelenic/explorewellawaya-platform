@extends('admin.layout')

@section('title', 'User Details')
@section('page-title', 'User Details')

@section('content')
<div class="page-header">
    <h1>User Details: {{ $user->name }}</h1>
    <div class="breadcrumb"><a href="{{ route('admin.users.index') }}">Users</a> / View</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>User Information</h3>
        <div class="actions">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
    
    <div style="padding: 1.5rem;">
        <div style="margin-bottom: 1.5rem;">
            <strong>ID:</strong> {{ $user->id }}
        </div>
        <div style="margin-bottom: 1.5rem;">
            <strong>Name:</strong> {{ $user->name }}
        </div>
        <div style="margin-bottom: 1.5rem;">
            <strong>Email:</strong> {{ $user->email }}
        </div>
        <div style="margin-bottom: 1.5rem;">
            <strong>Created At:</strong> {{ $user->created_at->format('M d, Y H:i') }}
        </div>
        <div style="margin-bottom: 1.5rem;">
            <strong>Updated At:</strong> {{ $user->updated_at->format('M d, Y H:i') }}
        </div>
        
        <div style="margin-top: 2rem;">
            <strong>Roles:</strong>
            <div style="margin-top: 0.5rem;">
                @forelse($user->roles as $role)
                    <span class="badge badge-primary" style="margin-right: 0.5rem;">{{ $role->name }}</span>
                @empty
                    <span style="color: var(--text-light);">No roles assigned</span>
                @endforelse
            </div>
        </div>
        
        @if($user->permissions->count() > 0)
        <div style="margin-top: 1.5rem;">
            <strong>Direct Permissions:</strong>
            <div style="margin-top: 0.5rem;">
                @foreach($user->permissions as $permission)
                    <span class="badge badge-success" style="margin-right: 0.5rem;">{{ $permission->name }}</span>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<div style="margin-top: 1.5rem;">
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Users
    </a>
</div>
@endsection


