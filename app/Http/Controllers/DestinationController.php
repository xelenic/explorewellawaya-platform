<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of published destinations.
     */
    public function index(Request $request)
    {
        $query = Destination::published()->with('user');

        // Filter by category if provided
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%');
            });
        }

        $destinations = $query->latest('published_at')->paginate(12);
        $categories = Destination::published()->distinct()->pluck('category');

        return view('destinations.index', compact('destinations', 'categories'));
    }

    /**
     * Display the specified destination.
     */
    public function show($slug)
    {
        $destination = Destination::published()
            ->where('slug', $slug)
            ->with('user')
            ->firstOrFail();

        // Get related destinations
        $relatedDestinations = Destination::published()
            ->where('id', '!=', $destination->id)
            ->where('category', $destination->category)
            ->latest('published_at')
            ->take(3)
            ->get();

        // If not enough related in same category, get any recent ones
        if ($relatedDestinations->count() < 3) {
            $additional = Destination::published()
                ->where('id', '!=', $destination->id)
                ->whereNotIn('id', $relatedDestinations->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedDestinations->count())
                ->get();
            
            $relatedDestinations = $relatedDestinations->merge($additional);
        }

        return view('destinations.show', compact('destination', 'relatedDestinations'));
    }
}
