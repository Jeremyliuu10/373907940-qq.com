<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'comment_id',
        'travel_post_id',
        'reviewer',
        'reviewee',
        'comment'
    ];
    protected $table='comments';
}
