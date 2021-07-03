<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends BnkApiModel
{
   protected $table='recipesingredients';
    protected $fillable=['amount','recipe_id',"ingredient_id"];
    use HasFactory;
}
