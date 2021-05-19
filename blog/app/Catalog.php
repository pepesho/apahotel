<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function ledgers()
    {
        return $this->hasMany(Ledger::class);
    }
}
