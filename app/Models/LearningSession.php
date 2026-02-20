<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningSession extends Model
{
    protected $fillable = [
        'user_id',
        'session_number',
        'title',
        'summary',
        'video_url',
        'source_code_url',
        'meeting_date',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function students(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_completed', 'completed_at')
            ->withTimestamps();
    }



    public function isCompletedBy(User $user): bool
    {
        return $this->students()
            ->where('users.id', $user->id)
            ->wherePivot('is_completed', true)
            ->exists();
    }

    public function getYoutubeEmbedUrlAttribute()
    {
        if (!$this->video_url) {
            return null;
        }

        $url = $this->video_url;

        if (str_contains($url, 'watch?v=')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            return isset($query['v'])
                ? 'https://www.youtube.com/embed/' . $query['v']
                : null;
        }

        if (str_contains($url, 'youtu.be/')) {
            $videoId = basename(parse_url($url, PHP_URL_PATH));
            return 'https://www.youtube.com/embed/' . $videoId;
        }

        if (str_contains($url, '/shorts/')) {
            $videoId = basename(parse_url($url, PHP_URL_PATH));
            return 'https://www.youtube.com/embed/' . $videoId;
        }

        return null;
    }
    public function isUnlockedFor(User $user): bool
    {
        if ($this->session_number === 1) {
            return true;
        }

        $previousSession = self::where('user_id', $this->user_id)
            ->where('session_number', $this->session_number - 1)
            ->first();

        if (!$previousSession) {
            return false;
        }

        return $user->completedSessions
            ->contains($previousSession->id);
    }
}
