<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++)
        {
            Recipe::create(['name' => 'recipe'.strval($i),
                'preview' => 'preview'.strval($i),
                'fulltext' => 'fulltext'.strval($i),]);
        }
    }

}
