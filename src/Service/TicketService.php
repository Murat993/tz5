<?php

namespace App\Service;

use App\Entity\Ticket;
use App\Repository\TicketRepository;
use Base\Request;

class TicketService
{
    protected $ticketRepository;

    public function __construct(TicketRepository $ticketRepository) {
        $this->ticketRepository = $ticketRepository;
    }

    public function createTicket(Request $request): Ticket
    {
        $ticket = new Ticket(
            $request->post('creator_id'),
            $request->post('title')
        );

        $this->ticketRepository->save($ticket);

        return $ticket;
    }
}