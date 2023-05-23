<?php

namespace Database\Seeders;

use App\Models\Portf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PortfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $portf = new Portf();
            $portf->repo_title = $faker->word;
            $portf->author = $faker->name;
            $portf->nickname = $faker->userName;
            $portf->description = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $portf->slug = Str::slug($portf->repo_title, '-');
            $portf->date_of_start = $faker->date($format = 'Y-m-d', $max = 'now');
            $portf->save();
        }
    }
}
