<?php

namespace App\Repository;

use App\Entity\User;

class UserRepository
{
    public function findOne(): User
    {
        return new User('Login', 'Name');
    }
}