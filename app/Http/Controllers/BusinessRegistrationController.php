<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Guide;
use App\Models\TravelAgency;
use App\Models\PassengerTransport;
use App\Models\SocialMediaActivist;
use App\Models\Restaurant;
use App\Models\HandyCraft;
use App\Models\Innovation;
use App\Models\CulturedSector;
use App\Models\Translator;
use App\Models\MassMedia;
use App\Models\ExperienceProvider;

class BusinessRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('business-registration.register');
    }

    public function register(Request $request)
    {
        $type = $request->input('registration_type');

        switch ($type) {
            case 'hotel':
                return $this->registerHotel($request);
            case 'guide':
                return $this->registerGuide($request);
            case 'travel_agency':
                return $this->registerTravelAgency($request);
            case 'passenger_transport':
                return $this->registerPassengerTransport($request);
            case 'social_media_activist':
                return $this->registerSocialMediaActivist($request);
            case 'restaurant':
                return $this->registerRestaurant($request);
            case 'handy_craft':
                return $this->registerHandyCraft($request);
            case 'innovation':
                return $this->registerInnovation($request);
            case 'cultured_sector':
                return $this->registerCulturedSector($request);
            case 'translator':
                return $this->registerTranslator($request);
            case 'mass_media':
                return $this->registerMassMedia($request);
            case 'experience_provider':
                return $this->registerExperienceProvider($request);
            default:
                return back()->with('error', 'Invalid registration type.');
        }
    }

    private function registerHotel(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'hotel_type' => 'required|string|max:255',
            'room_qty' => 'required|integer|min:1',
            'ac_available' => 'boolean',
            'bar_available' => 'boolean',
            'swimming_pool_available' => 'boolean',
            'tourist_board_approved' => 'boolean',
            'location' => 'required|string|max:255',
            'images' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        $validated['ac_available'] = $request->has('ac_available');
        $validated['bar_available'] = $request->has('bar_available');
        $validated['swimming_pool_available'] = $request->has('swimming_pool_available');
        $validated['tourist_board_approved'] = $request->has('tourist_board_approved');
        
        if (!empty($validated['images'])) {
            $validated['images'] = json_encode(array_filter(explode(',', $validated['images'])));
        }

        Hotel::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerGuide(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'licence_number' => 'required|string|max:255|unique:guides,licence_number',
            'work_experience' => 'nullable|string',
            'special_achievements' => 'nullable|string',
            'language_skills' => 'nullable|string',
            'approved_locations' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['language_skills'])) {
            $validated['language_skills'] = json_encode(array_filter(explode(',', $validated['language_skills'])));
        }
        if (!empty($validated['approved_locations'])) {
            $validated['approved_locations'] = json_encode(array_filter(explode(',', $validated['approved_locations'])));
        }

        Guide::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerTravelAgency(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'registration_number' => 'required|string|max:255|unique:travel_agencies,registration_number',
            'vehicles' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['vehicles'])) {
            $validated['vehicles'] = json_encode(array_filter(explode(',', $validated['vehicles'])));
        }

        TravelAgency::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerPassengerTransport(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255|unique:passenger_transports,registration_number',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        PassengerTransport::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerSocialMediaActivist(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'page_names' => 'nullable|string',
            'links' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['page_names'])) {
            $validated['page_names'] = json_encode(array_filter(explode(',', $validated['page_names'])));
        }
        if (!empty($validated['links'])) {
            $validated['links'] = json_encode(array_filter(explode(',', $validated['links'])));
        }

        SocialMediaActivist::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerRestaurant(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'restaurant_name' => 'required|string|max:255',
            'registration_number' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'employees' => 'nullable|integer|min:0',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        Restaurant::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerHandyCraft(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'business_registration_number' => 'nullable|string|max:255',
            'items' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['items'])) {
            $validated['items'] = json_encode(array_filter(explode(',', $validated['items'])));
        }

        HandyCraft::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerInnovation(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'innovation_type' => 'required|string|max:255',
            'best_achievements' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        Innovation::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerCulturedSector(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'institution_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'achievements' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        CulturedSector::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerTranslator(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'language_skills' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['language_skills'])) {
            $validated['language_skills'] = json_encode(array_filter(explode(',', $validated['language_skills'])));
        }

        Translator::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerMassMedia(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'types' => 'nullable|string',
            'registration_number' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['types'])) {
            $validated['types'] = json_encode(array_filter(explode(',', $validated['types'])));
        }

        MassMedia::create($validated);

        return redirect()->route('business-registration.success');
    }

    private function registerExperienceProvider(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'registration_number' => 'nullable|string|max:255',
            'types_of_experience' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
        ]);

        if (!empty($validated['types_of_experience'])) {
            $validated['types_of_experience'] = json_encode(array_filter(explode(',', $validated['types_of_experience'])));
        }

        ExperienceProvider::create($validated);

        return redirect()->route('business-registration.success');
    }

    public function success()
    {
        return view('business-registration.success');
    }
}
