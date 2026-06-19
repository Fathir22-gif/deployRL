<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface CommentServiceContract
{
    public function getComments(string $destination): Collection;

    public function addComment(string $destination, array $comment): bool;

    public function deleteComment(string $destination, int $index): bool;
}
