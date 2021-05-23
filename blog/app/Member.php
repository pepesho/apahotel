<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','email','address','postal','tel', 'birthday'];
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
