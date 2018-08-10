<?php

namespace iBrand\Component\User\Repository;

use Prettus\Repository\Contracts\RepositoryInterface;

interface UserRepository extends RepositoryInterface
{
    /**
     * Get a user by the given credentials.
     * @param array $credentials
     * @return mixed
     */
    public function getUserByCredentials(array $credentials);
}