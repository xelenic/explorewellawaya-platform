@extends('admin.layout')

@section('title', 'View Destination')
@section('page-title', 'Destination Details')

@section('content')
<div class="page-header">
    <h1>Destination Details</h1>
    <div class="breadcrumb"><a href="{{ route('admin.destinations.index') }}">Destinations</a> / View</div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3>{{ $destination->name }}</h3>
        <div style="display: flex; gap: 0.5rem;">
            <a href="{{ route('admin.destinations.edit', $destination) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this destination?');">
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
                    @if($destination->is_published)
                        <span class="badge badge-success">Published</span>
                    @else
                        <span class="badge" style="background: #e3f2fd; color: #1976d2;">Draft</span>
                    @endif
                </div>
                <div>
                    <strong>Author:</strong> {{ $destination->user->name }}
                </div>
                <div>
                    <strong>Location:</strong> {{ $destination->location }}
                </div>
                <div>
                    <strong>Category:</strong> {{ $destination->category }}
                </div>
                <div>
                    <strong>Slug:</strong> <code>{{ $destination->slug }}</code>
                </div>
            </div>
            
            <div style="display: flex; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap;">
                <div>
                    <strong>Created:</strong> {{ $destination->created_at->format('F d, Y \a\t g:i A') }}
                </div>
                <div>
                    <strong>Updated:</strong> {{ $destination->updated_at->format('F d, Y \a\t g:i A') }}
                </div>
                @if($destination->published_at)
                    <div>
                        <strong>Published:</strong> {{ $destination->published_at->format('F d, Y \a\t g:i A') }}
                    </div>
                @endif
            </div>
            
            @if($destination->latitude && $destination->longitude)
                <div style="margin-top: 1rem;">
                    <strong>Coordinates:</strong> {{ $destination->latitude }}, {{ $destination->longitude }}
                </div>
            @endif
        </div>
        
        @if($destination->featured_image)
            <div style="margin-bottom: 2rem;">
                <strong>Featured Image:</strong><br>
                <a href="{{ $destination->featured_image }}" target="_blank" style="color: var(--secondary-color); text-decoration: none;">
                    <img src="{{ $destination->featured_image }}" alt="{{ $destination->name }}" style="max-width: 400px; height: auto; border-radius: 8px; margin-top: 0.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                </a>
            </div>
        @endif
        
        @if($destination->images && count($destination->images) > 0)
            <div style="margin-bottom: 2rem;">
                <strong>Additional Images:</strong>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; margin-top: 0.5rem;">
                    @foreach($destination->images as $image)
                        <a href="{{ $image }}" target="_blank">
                            <img src="{{ $image }}" alt="Destination image" style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
        
        <div style="margin-bottom: 2rem;">
            <strong>Description:</strong>
            <div style="margin-top: 1rem; padding: 1.5rem; background: var(--light-bg); border-radius: 8px; white-space: pre-wrap; line-height: 1.8; color: var(--text-dark);">
{{ $destination->description }}
            </div>
        </div>
        
        @if($destination->highlights)
            <div style="margin-bottom: 2rem;">
                <strong>Highlights:</strong>
                <div style="margin-top: 1rem; padding: 1.5rem; background: var(--light-bg); border-radius: 8px; white-space: pre-wrap; line-height: 1.8; color: var(--text-dark);">
{{ $destination->highlights }}
                </div>
            </div>
        @endif
        
        @if($destination->best_time_to_visit)
            <div style="margin-bottom: 2rem; padding: 1rem; background: #fff3e0; border-radius: 8px; border-left: 4px solid #ff9800;">
                <strong>Best Time to Visit:</strong>
                <p style="margin-top: 0.5rem; color: var(--text-dark);">{{ $destination->best_time_to_visit }}</p>
            </div>
        @endif
        
        @if($destination->how_to_reach)
            <div style="margin-bottom: 2rem;">
                <strong>How to Reach:</strong>
                <div style="margin-top: 1rem; padding: 1.5rem; background: var(--light-bg); border-radius: 8px; white-space: pre-wrap; line-height: 1.8; color: var(--text-dark);">
{{ $destination->how_to_reach }}
                </div>
            </div>
        @endif
        
        @if($destination->tips)
            <div style="margin-bottom: 2rem;">
                <strong>Tips:</strong>
                <div style="margin-top: 1rem; padding: 1.5rem; background: var(--light-bg); border-radius: 8px; white-space: pre-wrap; line-height: 1.8; color: var(--text-dark);">
{{ $destination->tips }}
                </div>
            </div>
        @endif
        
        @if($destination->is_published)
            <div style="padding: 1rem; background: #e8f5e9; border-radius: 8px; border-left: 4px solid #388e3c; margin-top: 2rem;">
                <strong>Public URL:</strong>
                <div style="margin-top: 0.5rem;">
                    <a href="{{ route('destinations.show', $destination->slug) }}" target="_blank" style="color: #388e3c; text-decoration: none; font-weight: 500;">
                        {{ route('destinations.show', $destination->slug) }}
                        <i class="fas fa-external-link-alt" style="margin-left: 0.5rem;"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<div style="margin-top: 1.5rem;">
    <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>
</div>
@endsection

