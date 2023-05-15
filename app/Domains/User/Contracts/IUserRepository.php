<?php

declare(strict_types=1);

namespace App\Domains\User\Contracts;

use App\Data\Collections\UserCollection;
use App\Data\Models\User;
use App\Domains\User\UserNotFoundException;

interface IUserRepository
{
    /**
     * Summary of findOrFail
     * @param string $column
     * @param string|int $value
     * @return User
     * @throws UserNotFoundException
     */
    public function findOrFail(string $column, string|int $value): User;


    /**
     * Summary of findFirst
     * @param string $column
     * @param string|int $value
     * @return User|null
     */
    public function findFirst(string $column, string|int $value): User|null;

    /**
     * Summary of findAll
     *
     * @return UserCollection
     */
    public function findAll(): UserCollection;

    /**
     * @param  int  $id
     * @return User
     *
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): User;
}
