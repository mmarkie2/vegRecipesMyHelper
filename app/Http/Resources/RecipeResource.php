<?php

namespace App\Http\Resources;

use App\Models\Recipe;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return  (new Recipe)->getToArray($this);
    }
}
