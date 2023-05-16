<?php

namespace App\Entity;

class User
{
    private int $id;
    private string $login;
    private string $name;

    public function __construct(string $login, string $name)
    {
        $this->id = openssl_random_pseudo_bytes(10);
        $this->login = $login;
        $this->name = $name;
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
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}