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
            'HTML',
            'CSS',
            'JavaScript',
            'React.js',
            'Angular.js',
            'Vue.js',
            'jQuery',
            'Backbone.js',
            'Node.js',
            'PHP',
            'Laravel',
            'Zend Framework',
            'Phalcon',
            'Slim',
            'Yii',
            'Flight',
            'CakePHP',
            'CodeIgniter',
            'Symfony',
            'FuelPHP',
            'Java',
            'Spring Framework',
            'Java EE（Java Platform, Enterprise Edition）',
            'Apache Struts',
            'Apache Wicket',
            'Play Framework',
            'Spark Framework',
            'JSF（JavaServer Faces）',
            'SAStruts （Super Agile Struts）',
            'Hibernate',
            'GWT(Google Web Toolkit)',
            'Grails',
            'DropWizard',
            'Python',
            'Growler',
            'Tornado',
            'aiohttp',
            'Django',
            'CubicWeb',
            'Pylons',
            'Dash',
            'Flask',
            'Bottle',
            'C++',
            'C#',
            'Swift',
            'Ruby',
            'Ruby on Rails',
            'R',
            'Android',
            'Eclipse',
            'Kotlin',
            'GO',
            'AWS',
            'GCP',
            'Azure',
            'BAT',
            'Bash',
            'TTL',
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
