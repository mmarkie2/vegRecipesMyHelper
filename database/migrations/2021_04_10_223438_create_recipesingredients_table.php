<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesingredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recipesingredients');
        Schema::create('recipesingredients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('recipe_id');
            $table->foreign("recipe_id")->references('id')->on('recipes');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign("ingredient_id")->references('id')->on('ingredients');
            $table->string("amount");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipesingredients');
    }
}
