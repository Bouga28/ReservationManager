<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'type_id'
    ];

    public function type()
    { 
        return $this->belongsTo(Type::class); 
    }
    public function reservations() 
    { 
        return $this->hasMany(Reservation::class); 
    }    

}
