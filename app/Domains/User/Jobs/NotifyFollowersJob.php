<?php

namespace App\Domains\User\Jobs;

use App\Notifications\Job\JobPostPublished;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Notification;
use Lucid\Units\Job;

class NotifyFollowersJob extends Job
{
    /**
     * @var Collection
     */
    private $followers;

    /**
     * Create a new job instance.
     *
     * @param  Collection  $followers of User models
     */
    public function __construct(Collection $followers)
    {
        $this->followers = $followers;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Notification::send($this->followers, new JobPostPublished());
    }
}
