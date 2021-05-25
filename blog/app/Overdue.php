<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overdue extends Model
{
    public function borrow_member()
    {
        return $this->hasMany(Borrow::class);
    }
}
