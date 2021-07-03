<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::resource('ingredient', 'App\Http\Controllers\IngredientController');


    Route::resource('recipe', 'App\Http\Controllers\RecipeController');

    Route::get('recipe/{recipeId}/ingredient', 'App\Http\Controllers\RecipeIngredientController@index');
    Route::post('recipe/{recipeId}/ingredient', 'App\Http\Controllers\RecipeIngredientController@store');
    Route::get('recipe/{recipeId}/ingredient/{ingredientId}', 'App\Http\Controllers\RecipeIngredientController@show');
    Route::patch('recipe/{recipeId}/ingredient/{ingredientId}', 'App\Http\Controllers\RecipeIngredientController@update');
    Route::delete('recipe/{recipeId}/ingredient/{ingredientId}', 'App\Http\Controllers\RecipeIngredientController@destroy');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


