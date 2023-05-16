<?php

namespace Resource;

use App\Entity\Comment;

class CommentResource
{
    public static function resource(Comment $comment)
    {
        return [
          'id' => $comment->getId(),
          'title' => $comment->getComment(),
          'status' => $comment->getAuthorId(),
          'created_at' => $comment->getTicketId(),
        ];
    }

    public static function collection(array $tickets)
    {
        return array_map(static function(Comment $comment) {
            return [
                'id' => $comment->getId(),
                'title' => $comment->getComment(),
                'status' => $comment->getAuthorId(),
                'created_at' => $comment->getTicketId(),
            ];
        }, $tickets);
    }
}