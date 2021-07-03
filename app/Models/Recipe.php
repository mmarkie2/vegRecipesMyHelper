<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class Recipe extends BnkApiModel
{


    use HasFactory;


    protected $fillable = ['name', 'preview', 'fulltext'];


}
