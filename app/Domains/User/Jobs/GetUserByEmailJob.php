<?php

namespace App\Domains\User\Jobs;

use App\Data\Models\User;
use App\Data\Repositories\UserRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Lucid\Units\Job;

class GetUserByEmailJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(protected string $email)
    {
    }

    /**
     * Summary of handle
     * @param UserRepository $userRepository
     * @return User
     */
    public function handle(UserRepository $userRepository): User|ModelNotFoundException
    {
        $user = $userRepository->findUserOfEmail($this->email);

        if (!$user) {
            return new ModelNotFoundException("You don't have an account with us");
        }

        return $user;
    }
}
