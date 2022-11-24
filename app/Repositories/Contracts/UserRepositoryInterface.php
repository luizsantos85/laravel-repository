<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function search(array $data);
}