<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bed_type extends Model
{
     protected $table = "bed_types";
	 protected $primaryKey = 'bed_type_id';
	 protected $fillable = [

       'bed_type_name','status',
    ];
}
