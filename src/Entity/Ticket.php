<?php

namespace App\Entity;

class Ticket
{
    private int $id;
    private string $title;
    private int $creatorId;
    private int $inWorkUserId;
    private string $status;
    private string $createdAt;

    const STATUS_NEW = 'new';
    const STATUS_IN_WORK = 'in_work';
    const STATUS_WAIT_ANSWER = 'closed';
    const STATUS_CLOSED = 'closed';

    public function __construct(int $creatorId, string $title)
    {
        $this->id = openssl_random_pseudo_bytes(10);
        $this->creatorId = $creatorId;
        $this->title = $title;
        $this->status = self::STATUS_NEW;
        $this->createdAt = date('Y-m-d H:i');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getInWorkUserId(): int
    {
        return $this->inWorkUserId;
    }

    /**
     * @param int $inWorkUserId
     */
    public function setInWorkUserId(int $inWorkUserId): void
    {
        $this->inWorkUserId = $inWorkUserId;
    }

    /**
     * @return int
     */
    public function getCreatorId(): int
    {
        return $this->creatorId;
    }

    /**
     * @param int $creatorId
     */
    public function setCreatorId(int $creatorId): void
    {
        $this->creatorId = $creatorId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}