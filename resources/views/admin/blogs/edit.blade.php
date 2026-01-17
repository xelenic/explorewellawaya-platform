@extends('admin.layout')

@section('title', 'Edit Blog Post')
@section('page-title', 'Edit Blog Post')

@section('content')
<div class="page-header">
    <h1>Edit Blog Post</h1>
    <div class="breadcrumb"><a href="{{ route('admin.blogs.index') }}">Blog Posts</a> / Edit</div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Blog Post Information</h3>
    </div>
    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label" for="title">Title *</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}" placeholder="auto-generated if left empty">
            <small style="color: var(--text-light);">URL-friendly version of the title. Leave empty to auto-generate.</small>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="excerpt">Excerpt</label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="3" placeholder="Brief summary of the post">{{ old('excerpt', $blog->excerpt) }}</textarea>
            <small style="color: var(--text-light);">A short summary that appears in blog listings (max 500 characters).</small>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="content">Content *</label>
            <textarea class="form-control" id="content" name="content" rows="15" required>{{ old('content', $blog->content) }}</textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="featured_image_file">Featured Image</label>
            <input type="file" class="form-control" id="featured_image_file" name="featured_image_file" accept="image/*" onchange="previewImage(this)">
            <small style="color: var(--text-light);">Upload an image file (JPEG, PNG, JPG, GIF, WebP - Max 5MB)</small>
            @if($blog->featured_image)
                <div style="margin-top: 1rem;">
                    <p style="color: var(--text-light); margin-bottom: 0.5rem;">Current Image:</p>
                    <img src="{{ $blog->featured_image }}" alt="Current featured image" style="max-width: 300px; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color);">
                </div>
            @endif
            <div id="imagePreview" style="margin-top: 1rem; display: none;">
                <p style="color: var(--text-light); margin-bottom: 0.5rem;">New Image Preview:</p>
                <img id="previewImg" src="" alt="Preview" style="max-width: 300px; max-height: 200px; border-radius: 8px; border: 2px solid var(--border-color);">
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="featured_image">Or Featured Image URL</label>
            <input type="url" class="form-control" id="featured_image" name="featured_image" value="{{ old('featured_image', $blog->featured_image) }}" placeholder="https://example.com/image.jpg">
            <small style="color: var(--text-light);">Alternatively, provide a URL to an image. File upload takes priority if both are provided.</small>
        </div>
        
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="is_published" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Publish this post</label>
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="published_at">Published At</label>
            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}">
            <small style="color: var(--text-light);">Leave empty to use current date/time when published.</small>
        </div>
        
        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Post
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        const slugInput = document.getElementById('slug');
        if (!slugInput.value || slugInput.dataset.autoGenerated === 'true') {
            const title = this.value;
            const slug = title.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            slugInput.value = slug;
            slugInput.dataset.autoGenerated = 'true';
        }
    });

    // Stop auto-generation if user manually edits slug
    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.autoGenerated = 'false';
    });

    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
@endpush
@endsection
