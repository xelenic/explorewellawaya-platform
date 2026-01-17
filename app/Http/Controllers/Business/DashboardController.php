<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $business = $this->getUserBusiness($user->id);
        $businessType = $this->getBusinessType($user->id);

        return view('business.dashboard', compact('business', 'businessType'));
    }

    /**
     * Get the business record for a user
     */
    private function getUserBusiness($userId)
    {
        $businessTables = [
            'hotel' => Hotel::class,
            'guide' => Guide::class,
            'travel_agency' => TravelAgency::class,
            'passenger_transport' => PassengerTransport::class,
            'social_media_activist' => SocialMediaActivist::class,
            'restaurant' => Restaurant::class,
            'handy_craft' => HandyCraft::class,
            'innovation' => Innovation::class,
            'cultured_sector' => CulturedSector::class,
            'translator' => Translator::class,
            'mass_media' => MassMedia::class,
            'experience_provider' => ExperienceProvider::class,
        ];

        foreach ($businessTables as $type => $model) {
            $business = $model::where('user_id', $userId)->first();
            if ($business) {
                return $business;
            }
        }

        return null;
    }

    /**
     * Get the business type for a user
     */
    private function getBusinessType($userId)
    {
        $businessTables = [
            'hotel' => Hotel::class,
            'guide' => Guide::class,
            'travel_agency' => TravelAgency::class,
            'passenger_transport' => PassengerTransport::class,
            'social_media_activist' => SocialMediaActivist::class,
            'restaurant' => Restaurant::class,
            'handy_craft' => HandyCraft::class,
            'innovation' => Innovation::class,
            'cultured_sector' => CulturedSector::class,
            'translator' => Translator::class,
            'mass_media' => MassMedia::class,
            'experience_provider' => ExperienceProvider::class,
        ];

        foreach ($businessTables as $type => $model) {
            $business = $model::where('user_id', $userId)->first();
            if ($business) {
                return $type;
            }
        }

        return null;
    }
}
