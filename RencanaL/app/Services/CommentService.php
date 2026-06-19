<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    /**
     * Get comments for a destination ordered by newest first.
     */
    public function getForDestination(string $destination)
    {
        return Comment::where('destination', $destination)->latest()->get();
    }

    public function getSummary(string $destination): array
    {
        $comments = Comment::where('destination', $destination);
        $count = $comments->count();
        $average = $comments->whereNotNull('rating')->avg('rating');

        return [
            'count' => $count,
            'average_rating' => $average ? number_format($average, 1) : null,
        ];
    }

    /**
     * Create a comment.
     * Accepts validated data array and optional user object.
     */
    public function create(array $data, $user = null): Comment
    {
        $data['user_id'] = $user ? ($user->id ?? null) : null;
        return Comment::create($data);
    }
}
