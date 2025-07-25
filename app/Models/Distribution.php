<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $guarded = ['id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
