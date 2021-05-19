<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = ['book_id','member_id','borrow_date'];
    
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
