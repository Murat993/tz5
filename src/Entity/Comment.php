<?php

namespace App\Entity;

class Comment
{
    private int $id;
    private string $comment;
    private int $ticketId;
    private int $authorId;

    public function __construct(string $comment, int $ticketId, int $authorId)
    {
        $this->id = openssl_random_pseudo_bytes(10);
        $this->comment = $comment;
        $this->ticketId = $ticketId;
        $this->authorId = $authorId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getTicketId(): int
    {
        return $this->ticketId;
    }

    /**
     * @param int $ticketId
     */
    public function setTicketId(int $ticketId): void
    {
        $this->ticketId = $ticketId;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     */
    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }
}