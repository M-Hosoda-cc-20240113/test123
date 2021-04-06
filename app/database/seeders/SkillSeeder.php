<?php

namespace Database\Seeders;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $names = [
            'PHP',
            'Python',
            'JavaScript',
            'Java',
            'Flutter',
            'Laravel',
            'React.js',
            'Vue.js',
            'HTML',
            'CSS',
            'CakePHP',
            'Angular',
            'Sass',
            'C#',
            'C++',
            'Django'
        ];
        $now = Carbon::now();
        foreach ($names as $name) {
            // $year = rand(0.3);
            Skill::create([
                'name'       => $name,
                'created_at' => $now
            ]);  
        }
    }
}
