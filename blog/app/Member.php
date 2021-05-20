<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','email','address','postal','tel'];
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
    public function ledgers()
    {
        return $this->belongsToMany(Ledger::class,'borrows');
    }
}
