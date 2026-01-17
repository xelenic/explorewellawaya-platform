<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::with('user')->latest()->paginate(15);
        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:destinations,slug'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'images' => ['nullable', 'string'],
            'highlights' => ['nullable', 'string'],
            'best_time_to_visit' => ['nullable', 'string', 'max:255'],
            'how_to_reach' => ['nullable', 'string'],
            'tips' => ['nullable', 'string'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            
            // Ensure uniqueness
            $count = Destination::where('slug', $validated['slug'])->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }

        $validated['user_id'] = auth()->id();
        $validated['is_published'] = $request->has('is_published');

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle images array
        if (!empty($validated['images'])) {
            $validated['images'] = json_encode(array_filter(explode(',', $validated['images'])));
        }

        Destination::create($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $destination->load('user');
        return view('admin.destinations.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:destinations,slug,' . $destination->id],
            'description' => ['required', 'string'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'featured_image' => ['nullable', 'string', 'max:255'],
            'images' => ['nullable', 'string'],
            'highlights' => ['nullable', 'string'],
            'best_time_to_visit' => ['nullable', 'string', 'max:255'],
            'how_to_reach' => ['nullable', 'string'],
            'tips' => ['nullable', 'string'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            
            // Ensure uniqueness
            $count = Destination::where('slug', $validated['slug'])
                ->where('id', '!=', $destination->id)
                ->count();
            if ($count > 0) {
                $validated['slug'] = $validated['slug'] . '-' . ($count + 1);
            }
        }

        $validated['is_published'] = $request->has('is_published');

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = $destination->published_at ?? now();
        }

        // Handle images array
        if (!empty($validated['images'])) {
            $validated['images'] = json_encode(array_filter(explode(',', $validated['images'])));
        }

        $destination->update($validated);

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }
}
