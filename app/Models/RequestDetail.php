<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Request;

class RequestDetail extends Model
{
    protected $guarded = ['id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function request(){
        return $this->belongsTo(Request::class);
    }
}
