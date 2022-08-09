<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Place extends Model
{
    use HasFactory;

    protected $table = 'places';

    protected $fillable = [
        "title", "description","image","address","likes","user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
