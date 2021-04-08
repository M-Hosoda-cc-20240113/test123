<?php

namespace Database\Seeders;
use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AgentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            '株式会社LiNew',
            'パッション株式会社',
            'インフィック株式会社',
            'Amazon.inc',
            'Apple.inc'
        ];
        $now = Carbon::now();
        foreach ($companies as $company) {
            Agent::create([
                'name'       => $company,
                'created_at' => $now
            ]);  
        }
    }
}
