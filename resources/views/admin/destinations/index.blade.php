@extends('admin.layout')

@section('title', 'Destinations')
@section('page-title', 'Destination Management')

@section('content')
<div class="page-header">
    <h1>Destination Management</h1>
    <div class="breadcrumb">Manage all destinations</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>All Destinations</h3>
        <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Destination
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Published At</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($destinations as $destination)
                <tr>
                    <td>{{ $destination->id }}</td>
                    <td>{{ Str::limit($destination->name, 50) }}</td>
                    <td>{{ Str::limit($destination->location, 30) }}</td>
                    <td>{{ $destination->category }}</td>
                    <td>{{ $destination->user->name }}</td>
                    <td>
                        @if($destination->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge" style="background: #e3f2fd; color: #1976d2;">Draft</span>
                        @endif
                    </td>
                    <td>
                        @if($destination->published_at)
                            {{ $destination->published_at->format('M d, Y') }}
                        @else
                            <span style="color: var(--text-light);">-</span>
                        @endif
                    </td>
                    <td>{{ $destination->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.destinations.show', $destination) }}" class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.destinations.edit', $destination) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this destination?');">
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
                    <td colspan="9" style="text-align: center; color: var(--text-light); padding: 2rem;">
                        No destinations found. <a href="{{ route('admin.destinations.create') }}">Create the first destination</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($destinations->hasPages())
        <div style="padding: 1rem; border-top: 1px solid var(--border-color);">
            {{ $destinations->links() }}
        </div>
    @endif
</div>
@endsection

