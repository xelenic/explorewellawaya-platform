<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $businessTables = [
            'hotels',
            'guides',
            'travel_agencies',
            'passenger_transports',
            'social_media_activists',
            'restaurants',
            'handy_crafts',
            'innovations',
            'cultured_sectors',
            'translators',
            'mass_media',
            'experience_providers',
        ];

        foreach ($businessTables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained()->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $businessTables = [
            'hotels',
            'guides',
            'travel_agencies',
            'passenger_transports',
            'social_media_activists',
            'restaurants',
            'handy_crafts',
            'innovations',
            'cultured_sectors',
            'translators',
            'mass_media',
            'experience_providers',
        ];

        foreach ($businessTables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            });
        }
    }
};
