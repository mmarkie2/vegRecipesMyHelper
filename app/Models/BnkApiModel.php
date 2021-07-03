<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class BnkApiModel extends Model
{
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

        $this->describeArray = $this->describe();
    }

    public $describeArray;

    public function describe()
    {
        $table = $this->getTable();
        $pdo = \DB::connection()->getPdo();
        return $pdo->query("describe $table")->fetchAll();
    }

    public function getToArray(JsonResource $jsonResource)
    {
        $ret = [];
        foreach ($this->describeArray as $column) {
            $ret[$column["Field"]] = $jsonResource[$column["Field"]];
        }

        return $ret;
    }

    public function getRules()
    {


        $ret = [];
        foreach ($this->describeArray as $column) {
            $rules="";
            if(strpos($column["Type"],"varchar")!== false)
            {
             $maxLength=   str_replace ("varchar(","",$column["Type"]);
                $maxLength=   str_replace (")","", $maxLength);
                $rules.="|string|max:". $maxLength;
            }
            else if(strpos($column["Type"], "bigint unsigned")!== false)
            {

                $rules.="|integer|max:18446744073709551615";
            }


            $ret[$column["Field"]] =  $rules;
        }


        return $ret;

    }

    public $nonInsertableFields=["created_at","updated_at","id"];


    public function getCreateArray(\Illuminate\Http\Request $request)
    {

        foreach ($this->describeArray as $column) {

            if(!in_array ( $column["Field"] , $this->nonInsertableFields ))
            {
                $ret[$column["Field"]]=$request[$column["Field"]];
            }



        }


        return $ret;

    }
}
