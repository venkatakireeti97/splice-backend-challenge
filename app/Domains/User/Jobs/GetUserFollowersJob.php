<?php

namespace App\Domains\User\Jobs;

use App\Data\Collections\UserCollection;
use App\Data\Models\User;
use Lucid\Units\Job;

class GetUserFollowersJob extends Job
{
    /**
     * @var int
     */
    private $userId;

    /**
     * Create a new job instance.
     *
     * @param  int  $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return UserCollection of User models
     */
    public function handle(): UserCollection
    {
        return User::find($this->userId)->followers;
    }
}
