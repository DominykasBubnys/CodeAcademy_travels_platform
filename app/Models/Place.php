<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;


class Place extends Model
{
    use HasFactory;

    // protected $table = 'places';

    protected $fillable = [
        "title", "description","image","address","likes","author_id",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
