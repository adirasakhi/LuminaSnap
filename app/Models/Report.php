<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     protected $fillable = [
        'photo_id',
        'reporter_id',
        'reason'
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
}
