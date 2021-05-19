<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['genre'];
    public function catalogs()
    {
        return $this->hasMany(Catalog::class);
    }
}
