<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['ISBN_id', 'arrival_day'];
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
