<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'deb',
        'fin',
        'approval',
        'resource_id',
        'user_id'
    ];

    public function resource()
    { 
        return $this->belongsTo(Resource::class); 
    }    
    public function user()
    { 
        return $this->belongsTo(User::class); 
    }       
}