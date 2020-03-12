<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('title', 'rank','isWinner','description')->withTimestamps();
    }

    public function organizer()
    {
        return $this->belongsTo(User::class,'organizer_id');
    }

    public function comment_users()
    {
        return $this->belongsToMany(User::class,'comments')->withPivot('content')->withTimestamps();
    }


}
