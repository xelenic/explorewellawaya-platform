<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page with featured destinations.
     */
    public function index()
    {
        // Get featured destinations (published, limit to 6 most recent)
        $featuredDestinations = Destination::published()
            ->with('user')
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('welcome', compact('featuredDestinations'));
    }
}
