<?php


namespace App\Repositories\Book;


use App\Repositories\EloquentRepositoryInterface;

interface BookRepositoryInterface extends EloquentRepositoryInterface
{
    public function indexByUserId($user_id);
}