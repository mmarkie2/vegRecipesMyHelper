<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\RecipeIngredientResource;
use App\Http\Resources\RecipeResource;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Recipeingredient;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return RecipeResource::collection(Recipe::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
        $recipe = Recipe::create((new Recipe())->getCreateArray( $request));

        return new RecipeResource( $recipe );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $recipe = Recipe::find($id);
        if(!$recipe)
        {

            return response()->json("'message':'resource not found'", 404)
                ->header('Content-Type', 'application/json');

        }
        else{

            return new RecipeResource( $recipe );
        }

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, $id)
    {
        $recipe = Recipe::find($id);
        if(!$recipe)
        {

            return response()->json("'message':'resource not found'", 404)
                ->header('Content-Type', 'application/json');

        }
        else{
            $recipe->update((new Recipe())->getCreateArray( $request));
            $recipe->save();

            return new RecipeResource( $recipe );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if(!$recipe)
        {

            return response()->json("'message':'resource not found'", 404)
                ->header('Content-Type', 'application/json');

        }
        else{
            $recipe->delete();


            return new RecipeResource( $recipe );
        }
    }


}
