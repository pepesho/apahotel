<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
