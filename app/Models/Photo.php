<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'caption',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function reports()
{
    return $this->hasMany(Report::class);
}
public function likes()
{
    return $this->hasMany(Like::class);
}

public function isLikedBy($user)
{
    return $this->likes()->where('user_id', $user->id)->exists();
}
public function comments()
{
    return $this->hasMany(Comment::class)->latest();
}
public function album()
{
    return $this->belongsTo(Album::class);
}
}
