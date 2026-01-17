@extends('admin.layout')

@section('title', 'Blog Posts')
@section('page-title', 'Blog Management')

@section('content')
<div class="page-header">
    <h1>Blog Management</h1>
    <div class="breadcrumb">Manage all blog posts</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>All Blog Posts</h3>
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Post
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Status</th>
                <th>Published At</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ Str::limit($blog->title, 50) }}</td>
                    <td>{{ $blog->user->name }}</td>
                    <td>
                        @if($blog->is_published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge" style="background: #e3f2fd; color: #1976d2;">Draft</span>
                        @endif
                    </td>
                    <td>
                        @if($blog->published_at)
                            {{ $blog->published_at->format('M d, Y') }}
                        @else
                            <span style="color: var(--text-light);">-</span>
                        @endif
                    </td>
                    <td>{{ $blog->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.blogs.show', $blog) }}" class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
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
                    <td colspan="7" style="text-align: center; color: var(--text-light); padding: 2rem;">
                        No blog posts found. <a href="{{ route('admin.blogs.create') }}">Create the first blog post</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    @if($blogs->hasPages())
        <div style="padding: 1rem; border-top: 1px solid var(--border-color);">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection
