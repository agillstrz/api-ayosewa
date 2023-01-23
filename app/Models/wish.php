<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wish extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Sewa(){
        return $this->belongsTo(Sewa::class,'sewa_id','id');
    }
}