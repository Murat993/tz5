<?php

namespace Resource;

use App\Entity\Ticket;

class TicketResource
{
    public static function resource(Ticket $ticket)
    {
        return [
          'id' => $ticket->getId(),
          'title' => $ticket->getTitle(),
          'status' => $ticket->getStatus(),
          'created_at' => $ticket->getCreatedAt(),
        ];
    }

    public static function collection(array $tickets)
    {
        return array_map(static function(Ticket $ticket) {
            return [
                'id' => $ticket->getId(),
                'title' => $ticket->getTitle(),
                'status' => $ticket->getStatus(),
                'created_at' => $ticket->getCreatedAt(),
            ];
        }, $tickets);
    }
}