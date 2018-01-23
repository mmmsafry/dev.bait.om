<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_type extends Model
{
     protected $table = "category_types";
	 protected $primaryKey = 'category_id';
	 protected $fillable = [

       'category_name','status',
    ];
}
