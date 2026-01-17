<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('user')->latest()->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'featured_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        // Handle file upload
        if ($request->hasFile('featured_image_file')) {
            $image = $request->file('featured_image_file');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('blogs', $imageName, 'public');
            $validated['featured_image'] = Storage::url($imagePath);
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure uniqueness
            $count = Blog::where('slug', $validated['slug'])->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }

        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->has('is_published');

        // Set published_at if publishing
        if ($validated['is_published']) {
            if (empty($validated['published_at'])) {
                $validated['published_at'] = now();
            } else {
                // If published_at is in the future, set it to now() to make it visible immediately
                $publishedAt = \Carbon\Carbon::parse($validated['published_at']);
                if ($publishedAt->isFuture()) {
                    $validated['published_at'] = now();
                }
            }
        } else {
            // If not published, don't set published_at
            $validated['published_at'] = null;
        }

        // Remove the file input from validated data
        unset($validated['featured_image_file']);

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('user');
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug,' . $blog->id],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'featured_image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        // Handle file upload
        if ($request->hasFile('featured_image_file')) {
            // Delete old image if it exists and is stored locally
            if ($blog->featured_image && strpos($blog->featured_image, '/storage/') !== false) {
                $oldImagePath = str_replace('/storage/', '', $blog->featured_image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $image = $request->file('featured_image_file');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('blogs', $imageName, 'public');
            $validated['featured_image'] = Storage::url($imagePath);
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure uniqueness
            $count = Blog::where('slug', $validated['slug'])
                ->where('id', '!=', $blog->id)
                ->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }

        $validated['is_published'] = $request->has('is_published');

        // Set published_at if publishing
        if ($validated['is_published']) {
            if (empty($validated['published_at'])) {
                $validated['published_at'] = $blog->published_at ?? now();
            } else {
                // If published_at is in the future, set it to now() to make it visible immediately
                $publishedAt = \Carbon\Carbon::parse($validated['published_at']);
                if ($publishedAt->isFuture()) {
                    $validated['published_at'] = now();
                }
            }
        } else {
            // If not published, keep existing published_at or set to null
            if (!$blog->is_published) {
                $validated['published_at'] = null;
            }
        }

        // Remove the file input from validated data
        unset($validated['featured_image_file']);

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}
