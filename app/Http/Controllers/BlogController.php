<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blog posts.
     */
    public function index()
    {
        $blogs = Blog::published()
            ->with('user')
            ->latest('published_at')
            ->paginate(9);

        return view('blog.index', compact('blogs'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $blog = Blog::published()
            ->where('slug', $slug)
            ->with('user')
            ->firstOrFail();

        // Get related posts
        $relatedPosts = Blog::published()
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedPosts'));
    }
}
