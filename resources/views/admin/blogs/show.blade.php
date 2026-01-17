@extends('admin.layout')

@section('title', 'View Blog Post')
@section('page-title', 'Blog Post Details')

@section('content')
<div class="page-header">
    <h1>Blog Post Details</h1>
    <div class="breadcrumb"><a href="{{ route('admin.blogs.index') }}">Blog Posts</a> / View</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>{{ $blog->title }}</h3>
        <div style="display: flex; gap: 0.5rem;">
            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
    
    <div style="padding: 1.5rem;">
        <div style="margin-bottom: 2rem;">
            <div style="display: flex; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap;">
                <div>
                    <strong>Status:</strong>
                    @if($blog->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge" style="background: #e3f2fd; color: #1976d2;">Draft</span>
                    @endif
                </div>
                <div>
                    <strong>Author:</strong> {{ $blog->user->name }}
                </div>
                <div>
                    <strong>Slug:</strong> <code>{{ $blog->slug }}</code>
                </div>
            </div>
            
            <div style="display: flex; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap;">
                <div>
                    <strong>Created:</strong> {{ $blog->created_at->format('F d, Y \a\t g:i A') }}
                </div>
                <div>
                    <strong>Updated:</strong> {{ $blog->updated_at->format('F d, Y \a\t g:i A') }}
                </div>
                @if($blog->published_at)
                    <div>
                        <strong>Published:</strong> {{ $blog->published_at->format('F d, Y \a\t g:i A') }}
                    </div>
                @endif
            </div>
            
            @if($blog->featured_image)
                <div style="margin-top: 1rem;">
                    <strong>Featured Image:</strong><br>
                    <a href="{{ $blog->featured_image }}" target="_blank" style="color: var(--secondary-color); text-decoration: none;">
                        <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" style="max-width: 400px; height: auto; border-radius: 8px; margin-top: 0.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    </a>
                </div>
            @endif
        </div>
        
        @if($blog->excerpt)
            <div style="margin-bottom: 2rem; padding: 1rem; background: var(--light-bg); border-radius: 8px; border-left: 4px solid var(--secondary-color);">
                <strong>Excerpt:</strong>
                <p style="margin-top: 0.5rem; color: var(--text-dark);">{{ $blog->excerpt }}</p>
            </div>
        @endif
        
        <div style="margin-bottom: 2rem;">
            <strong>Content:</strong>
            <div style="margin-top: 1rem; padding: 1.5rem; background: var(--light-bg); border-radius: 8px; white-space: pre-wrap; line-height: 1.8; color: var(--text-dark);">
{{ $blog->content }}
            </div>
        </div>
        
        @if($blog->is_published)
            <div style="padding: 1rem; background: #e8f5e9; border-radius: 8px; border-left: 4px solid #388e3c; margin-top: 2rem;">
                <strong>Public URL:</strong>
                <div style="margin-top: 0.5rem;">
                    <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" style="color: #388e3c; text-decoration: none; font-weight: 500;">
                        {{ route('blog.show', $blog->slug) }}
                        <i class="fas fa-external-link-alt" style="margin-left: 0.5rem;"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<div style="margin-top: 1.5rem;">
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>
@endsection
