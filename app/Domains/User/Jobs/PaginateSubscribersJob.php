<?php

namespace App\Domains\User\Jobs;

use App\Actions\User\CreateSubscribersPaginationByIdAction;
use App\Data\DataTransferObjects\CreatePaginationData;
use App\Data\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Lucid\Units\Job;

class PaginateSubscribersJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        protected User $author,
        protected int $pageSize = 15,
    ) {
    }

    /**
     * Execute the job.
     * 
     * @return LengthAwarePaginator
     */
    public function handle(): LengthAwarePaginator
    {
        return CreateSubscribersPaginationByIdAction::run(
            new CreatePaginationData(
                author: $this->author,
                page_size: $this->pageSize,
            )
        );
    }
}
