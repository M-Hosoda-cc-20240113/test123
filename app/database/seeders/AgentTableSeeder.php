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
            '株式会社LiNew' => '0123342353',
            'パッション株式会社' => '0125423353',
            'Amazon.inc' => '0135423353',
            'インフィック株式会社' => '07022423534',
            'Apple.inc' => '07023433534',
        ];
        $now = Carbon::now();
        foreach ($companies as $company => $number) {
            Agent::create([
                'name' => $company,
                'tel' => $number,
                'created_at' => $now,
            ]);
        }
    }
}
