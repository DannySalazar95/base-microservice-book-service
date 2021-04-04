<?php


namespace App\Services;


use App\Repositories\Book\BookRepositoryInterface;

class BookService
{
    /**
     * @var BookRepositoryInterface
     */
    protected $bookDB;

    /**
     * BookService constructor.
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookDB = $bookRepository;
    }

    public function indexByUser($user_id)
    {
        return $this->bookDB->indexByUserId($user_id);
    }
}