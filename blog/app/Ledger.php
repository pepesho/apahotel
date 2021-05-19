<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    //
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
