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
        $names = [
            'PHP',
            'Python',
            'JavaScript',
            'Java',
            'Flutter',
            'Laravel',
            'React.js',
            'Vue.js',
            'HTML5',
            'CSS3',
            'CakePHP',
            'Angular',
            'Sass',
            'C#',
            'C++',
            'Django',
            'IOS',
            'Android',
            'MySQL',
            'AWS',
            'Linux',
            'GO'
        ];
        $now = Carbon::now();
        foreach ($names as $name) {
            Skill::create([
                'name'       => $name,
                'created_at' => $now
            ]);  
        }
    }
}
