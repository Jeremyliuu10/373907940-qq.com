<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    //
    protected $fillable = [
        'name',
        'title',
        'description',
        'city',
        'tag',
        'start_date',
        'end_date'
    ];
}
