<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaguAnggaran extends Model
{
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
