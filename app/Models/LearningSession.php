<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningSession extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'summary',
        'video_url',
        'source_code_url',
        'meeting_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
