<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function kategori(){
        return $this->belongsTo(kategori::class, 'kate_id','id');
    }

    
}