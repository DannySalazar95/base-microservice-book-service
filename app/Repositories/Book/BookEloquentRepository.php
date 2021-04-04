<?php


namespace App\Repositories\Book;


use App\Models\Book;
use App\Repositories\BaseRepository;

class BookEloquentRepository extends BaseRepository implements BookRepositoryInterface
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }
    public function modelName(): string
    {
        return 'Libro';
    }

    public function indexByUserId($user_id)
    {
        return $this->model->where('user_id', $user_id)->get();
    }
}