<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class furniture_type extends Model
{
     protected $table = "furniture_types";
	 protected $primaryKey = 'furniture_type_id';
	 protected $fillable = [

       'furniture_name','status',
    ];
}
