<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Procrument extends Model
{
    protected $guarded = ['id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
