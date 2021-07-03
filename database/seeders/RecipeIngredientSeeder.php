<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Recipeingredient;
use Illuminate\Database\Seeder;

class RecipeIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $recipesIDs = Recipe::pluck('id');
        $ingredientsIDs = Ingredient::pluck('id');
        Recipeingredient::create(['amount' => 'amount',
            'recipe_id' =>  $recipesIDs[0],
            'ingredient_id' =>$ingredientsIDs[0],
            ]);
        Recipeingredient::create(['amount' => 'amount',
            'recipe_id' =>  $recipesIDs[0],
            'ingredient_id' =>$ingredientsIDs[1],
        ]);
    }
}
