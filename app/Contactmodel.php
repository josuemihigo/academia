<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactmodel extends Model
{
    //
   public function liste($query){
        return $query->where('status', 1)->get();
    }
}
