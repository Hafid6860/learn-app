<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LearningSession;

class LearningSessionPolicy
{
    /**
     * Admin can do everything
     */
    public function before(User $user, string $ability)
    {
        if ($user->is_admin) {
            return true;
        }
    }

    /**
     * Student can view only their own session
     */
    public function view(User $user, LearningSession $learningSession)
    {
        return $learningSession->user_id === $user->id;
    }

    /**
     * Student can mark completed only their own session
     */
    public function complete(User $user, LearningSession $learningSession)
    {
        return $learningSession->user_id === $user->id;
    }
}
