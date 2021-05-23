<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['ISBN_id', 'arrival_day'];
    public $timestamps = false;
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
    public function borrows()
    {
        return $this->hasOne(Borrow::class);
    }
    // public function borrow_ledgers()
    // {
    //     return $this->belongsToMany(Member::class,'borrows');
    // }
}
