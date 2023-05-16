<?php

namespace App\Repository;

use App\Entity\Ticket;

class TicketRepository
{
    public function save(Ticket $ticket)
    {
        return;
    }

    public function find(string $id): Ticket
    {
        return new Ticket(1,  'title');
    }

    public function findAll(string $status): array
    {
        return [];
    }

    public function remove(Ticket $ticket)
    {
        return;
    }
}