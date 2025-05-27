<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pensamiento extends Model
{
    use HasFactory;
    protected $table = 'pensamientos';
    protected $fillable = ['descripcion'];

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->timezone('America/Lima')->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->timezone('America/Lima')->format('Y-m-d H:i:s');
    }
}
