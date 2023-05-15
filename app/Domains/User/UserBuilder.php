<?php

declare(strict_types=1);

namespace App\Domains\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class UserBuilder extends Builder
{
    /**
     * Summary of whereMatch
     *
     * @param  array  $queryOption
     * @return UserBuilder
     */
    public function whereMatch(array $queryOption): self
    {
        return $this->select('*')
            ->when(Arr::has($queryOption, 'ids'), function ($query) use ($queryOption) {
                $query->whereIn('id', $queryOption['ids']);
            })
            ->when(Arr::has($queryOption, 'campaign_name'), function ($query) use ($queryOption) {
                $query->where('campaign_name', $queryOption['campaign_name']);
            })
            ->when(Arr::has($queryOption, 'subcampaign_name'), function ($query) use ($queryOption) {
                $query->where('subcampaign_name', $queryOption['subcampaign_name']);
            })
            ->when(Arr::has($queryOption, 'cellcode'), function ($query) use ($queryOption) {
                $query->where('cellcode', $queryOption['cellcode']);
            })
            ->when(Arr::has($queryOption, 'skill'), function ($query) use ($queryOption) {
                $query->where('skill', $queryOption['skill']);
            })
            ->when(Arr::has($queryOption, 'daily_priority'), function ($query) use ($queryOption) {
                $query->where('daily_priority', $queryOption['daily_priority ']);
            })
            ->when(Arr::has($queryOption, 'dialing_strategy'), function ($query) use ($queryOption) {
                $query->where('dialing_strategy', $queryOption['dialing_strategy']);
            })
            ->when(Arr::has($queryOption, 'subcampaign_name'), function ($query) use ($queryOption) {
                $query->where('subcampaign_name', $queryOption['subcampaign_name']);
            })
            ->when(Arr::has($queryOption, 'list_plan'), function ($query) use ($queryOption) {
                $query->where('list_plan', $queryOption['list_plan']);
            })
            ->when(Arr::has($queryOption, 'subcampaign_name'), function ($query) use ($queryOption) {
                $query->where('subcampaign_name', $queryOption['subcampaign_name']);
            });
    }
}
