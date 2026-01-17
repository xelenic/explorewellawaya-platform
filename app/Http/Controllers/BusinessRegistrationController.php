<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        $validated['ac_available'] = $request->has('ac_available');
        $validated['bar_available'] = $request->has('bar_available');
        $validated['swimming_pool_available'] = $request->has('swimming_pool_available');
        $validated['tourist_board_approved'] = $request->has('tourist_board_approved');
        
        if (!empty($validated['images'])) {
            $validated['images'] = json_encode(array_filter(explode(',', $validated['images'])));
        }

        $validated['user_id'] = $user->id;
        Hotel::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        if (!empty($validated['language_skills'])) {
            $validated['language_skills'] = json_encode(array_filter(explode(',', $validated['language_skills'])));
        }
        if (!empty($validated['approved_locations'])) {
            $validated['approved_locations'] = json_encode(array_filter(explode(',', $validated['approved_locations'])));
        }

        $validated['user_id'] = $user->id;
        Guide::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        if (!empty($validated['vehicles'])) {
            $validated['vehicles'] = json_encode(array_filter(explode(',', $validated['vehicles'])));
        }

        $validated['user_id'] = $user->id;
        TravelAgency::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        $validated['user_id'] = $user->id;
        PassengerTransport::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        if (!empty($validated['page_names'])) {
            $validated['page_names'] = json_encode(array_filter(explode(',', $validated['page_names'])));
        }
        if (!empty($validated['links'])) {
            $validated['links'] = json_encode(array_filter(explode(',', $validated['links'])));
        }

        $validated['user_id'] = $user->id;
        SocialMediaActivist::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        $validated['user_id'] = $user->id;
        Restaurant::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        if (!empty($validated['items'])) {
            $validated['items'] = json_encode(array_filter(explode(',', $validated['items'])));
        }

        $validated['user_id'] = $user->id;
        HandyCraft::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        $validated['user_id'] = $user->id;
        Innovation::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        $validated['user_id'] = $user->id;
        CulturedSector::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        if (!empty($validated['language_skills'])) {
            $validated['language_skills'] = json_encode(array_filter(explode(',', $validated['language_skills'])));
        }

        $validated['user_id'] = $user->id;
        Translator::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        if (!empty($validated['types'])) {
            $validated['types'] = json_encode(array_filter(explode(',', $validated['types'])));
        }

        $validated['user_id'] = $user->id;
        MassMedia::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
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

        // Create user account
        $user = $this->createBusinessOwnerAccount($request, $validated['name']);

        if (!empty($validated['types_of_experience'])) {
            $validated['types_of_experience'] = json_encode(array_filter(explode(',', $validated['types_of_experience'])));
        }

        $validated['user_id'] = $user->id;
        ExperienceProvider::create($validated);

        // Auto-login the user
        Auth::login($user);

        return redirect()->route('business.dashboard');
    }

    public function success()
    {
        return view('business-registration.success');
    }

    /**
     * Create a user account for business owner
     */
    private function createBusinessOwnerAccount(Request $request, string $businessName): User
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $businessName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Ensure business_owner role exists, create if it doesn't
        $businessOwnerRole = Role::firstOrCreate(['name' => 'business_owner']);
        
        // Ensure required permissions exist
        $manageBusinessPermission = Permission::firstOrCreate(['name' => 'manage business']);
        $viewDashboardPermission = Permission::firstOrCreate(['name' => 'view dashboard']);
        
        // Assign permissions to role if not already assigned
        if (!$businessOwnerRole->hasPermissionTo('manage business')) {
            $businessOwnerRole->givePermissionTo('manage business');
        }
        if (!$businessOwnerRole->hasPermissionTo('view dashboard')) {
            $businessOwnerRole->givePermissionTo('view dashboard');
        }

        // Assign business_owner role to user
        $user->assignRole('business_owner');

        return $user;
    }
}
