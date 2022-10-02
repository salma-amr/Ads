<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Advertiser;

class AdvertiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertiser::firstOrCreate([
            'name' => 'advertiser 1', 
            'email' => 'advertiser_1@reach.com', 
    ]);

    }
}
