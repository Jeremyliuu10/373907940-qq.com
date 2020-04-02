<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    //
     protected $fillable = [
          'name',
          'city',
          'description',
          'image_url'
          ];
}
