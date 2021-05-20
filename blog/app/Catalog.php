<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['ISBN_id', 'title', 'genre_id', 'author', 'publisher', 'publisher_date'];
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function ledgers()
    {
        return $this->hasMany(Ledger::class);
    }
}
