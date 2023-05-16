<?php

namespace App\Service;

use App\Entity\Comment;
use App\Entity\Ticket;
use App\Repository\CommentRepository;
use App\Repository\TicketRepository;
use App\Repository\UserRepository;

class CommentService
{
    private CommentRepository $commentRepository;
    private UserRepository $userRepository;
    private TicketRepository $ticketRepository;

    public function __construct(
        CommentRepository $commentRepository,
        UserRepository $userRepository,
        TicketRepository $ticketRepository
    ) {
        $this->commentRepository = $commentRepository;
        $this->userRepository = $userRepository;
        $this->ticketRepository = $ticketRepository;
    }

    public function createComment(string $comment, Ticket $ticket): Comment
    {
        $user = $this->userRepository->findOne();

        $model = new Comment(
            $comment,
            $ticket->getId(),
            $user->getId(),
        );

        $this->commentRepository->save($model);

        return $model;
    }

    public function create(string $comment, int $ticketId): Comment
    {
        $ticket = $this->ticketRepository->find($ticketId);
        $user = $this->userRepository->findOne();

        $ticket->setStatus(Ticket::STATUS_WAIT_ANSWER);
        $this->ticketRepository->save($ticket);

        $model = new Comment(
            $comment,
            $ticket->getId(),
            $user->getId(),
        );

        $this->commentRepository->save($model);

        return $model;
    }
}