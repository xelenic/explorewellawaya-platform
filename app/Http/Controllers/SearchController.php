<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Display search results page
     */
    public function index(Request $request)
    {
        $query = $request->get('q', '');
        
        $destinations = collect();
        $blogs = collect();
        
        if ($query) {
            // Search destinations
            $destinations = Destination::published()
                ->where(function($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%')
                      ->orWhere('description', 'like', '%' . $query . '%')
                      ->orWhere('location', 'like', '%' . $query . '%')
                      ->orWhere('category', 'like', '%' . $query . '%');
                })
                ->latest('published_at')
                ->paginate(10, ['*'], 'destinations_page');
            
            // Search blogs
            $blogs = Blog::published()
                ->where(function($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%')
                      ->orWhere('excerpt', 'like', '%' . $query . '%')
                      ->orWhere('content', 'like', '%' . $query . '%');
                })
                ->latest('published_at')
                ->paginate(10, ['*'], 'blogs_page');
        }
        
        return view('search.index', compact('query', 'destinations', 'blogs'));
    }
    
    /**
     * Get autocomplete suggestions (AJAX)
     */
    public function autocomplete(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }
        
        $results = [];
        
        // Get destination suggestions
        $destinations = Destination::published()
            ->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhere('location', 'like', '%' . $query . '%');
            })
            ->select('name', 'location', 'slug', 'category')
            ->limit(5)
            ->get();
        
        foreach ($destinations as $destination) {
            $results[] = [
                'type' => 'destination',
                'title' => $destination->name,
                'subtitle' => $destination->location,
                'category' => $destination->category,
                'url' => route('destinations.show', $destination->slug),
                'icon' => 'fas fa-map-marker-alt'
            ];
        }
        
        // Get blog suggestions
        $blogs = Blog::published()
            ->where(function($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                  ->orWhere('excerpt', 'like', '%' . $query . '%');
            })
            ->select('title', 'slug', 'excerpt')
            ->limit(5)
            ->get();
        
        foreach ($blogs as $blog) {
            $results[] = [
                'type' => 'blog',
                'title' => $blog->title,
                'subtitle' => Str::limit($blog->excerpt ?? '', 60),
                'url' => route('blog.show', $blog->slug),
                'icon' => 'fas fa-blog'
            ];
        }
        
        return response()->json($results);
    }
}
