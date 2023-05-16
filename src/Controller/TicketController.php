<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Repository\TicketRepository;
use App\Service\CommentService;
use App\Service\TicketService;
use Base\Request;
use Base\Response;
use Resource\TicketResource;

class TicketController
{
    private TicketService $ticketService;
    private CommentService $commentService;
    private TicketRepository $ticketRepository;

    public function __construct(
        TicketService $ticketService,
        CommentService $commentService,
        TicketRepository $ticketRepository
    ) {
        $this->ticketService = $ticketService;
        $this->commentService = $commentService;
        $this->ticketRepository = $ticketRepository;
    }

    public function createTicket(Request $request, Response $response)
    {
        $ticket = $this->ticketService->createTicket($request);

        if ($ticket) {
            $this->commentService->createComment($request->post('comment'), $ticket);
        }

        $response->json(TicketResource::resource($ticket), 201)->send();
    }

    public function ticketList($status, Request $request, Response $response)
    {
        $tickets = $this->ticketRepository->findAll($status);

        $response->json(TicketResource::collection($tickets))->send();
    }

    public function ticketWork($id, Request $request, Response $response)
    {
        $ticket = $this->ticketRepository->find($id);
        $ticket->setStatus(Ticket::STATUS_IN_WORK);
        $ticket->setInWorkUserId($request->post('in_work_user_id'));

        $this->ticketRepository->save($ticket);

        $response->json(TicketResource::resource($ticket))->send();
    }

    public function ticketDelete($id, Request $request, Response $response)
    {
        $ticket = $this->ticketRepository->find($id);

        $this->ticketRepository->remove($ticket);

        $response->json(['message' => 'removed'])->send();
    }
}