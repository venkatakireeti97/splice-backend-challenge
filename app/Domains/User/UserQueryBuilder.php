<?php

namespace App\Domains\User;

use App\Data\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\QueryBuilder;

use function PHPUnit\Framework\returnArgument;

class UserQueryBuilder extends Builder
{
    public function findSubscribersByAuthorId(int $authorId)
    {
        return QueryBuilder::for (User::class)
            ->where('ID', $authorId)
            ->get();
    }

    public function findByEmail(string $username)
    {
        return $this->findFirstOrFailBy('user_email', $username);
    }

    public function findByUsername(string $username)
    {
        return $this->findFirstOrFailBy('user_login', $username);
    }

    public function findFirstOrFailBy(string $column, string|int $value) // : User
    {
        return QueryBuilder::for(User::class)
            ->where($column, $value)
            ->firstOrFail();
    }

    public function findFirstBy(string $column, string|int $value)
    {
        return QueryBuilder::for(User::class)
            ->where($column, $value)
            ->first();
    }

    public function findAll()
    {
        return QueryBuilder::for(User::class)
            // ->withTrashed() // use your existing scopes
            // ->allowedIncludes('posts', 'permissions')
            // ->allowedFilters('name', 'email)
            //  ->allowedFields(['id', 'email'])
            // ->get();
            // ->paginate()
            // ->appends(request()->query());
            ->toSql();
    }
}
