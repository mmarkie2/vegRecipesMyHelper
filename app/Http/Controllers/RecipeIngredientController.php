<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeIngredientRequest;
use App\Http\Resources\RecipeIngredientResource;
use App\Models\RecipeIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($recipeId)
    {
        $recipeIngredients= DB::table('recipesingredients')->where('recipe_id','=',$recipeId)->get();

        return  RecipeIngredientResource::collection(    $recipeIngredients);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeIngredientRequest $request)
    {
        $recipeIngredient = RecipeIngredient::create((new  RecipeIngredient())->getCreateArray( $request));

        return new RecipeResource($recipeIngredient );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
