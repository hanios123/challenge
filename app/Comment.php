<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Comment extends Model
{
    protected $fillable = [
        'content','challenge_id','user_id'
    ];
}
