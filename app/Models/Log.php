<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function perangkat(){
        return $this->hasOne(Perangkat::class, 'id', 'perangkat_id');
    }
    
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
