<?php

namespace App\Http\Controllers;

use App\Exceptions\JwtNoExistsException;
use App\Http\Requests\Book\BookIndexByUserAuthRequest;
use App\Http\Resources\Book\BookIndexByUserIdResource;
use App\Services\BookService;
use App\Services\JwtService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    /**
     * @var BookService
     */
    private $bookServ;
    /**
     * @var JwtService
     */
    private $jwtServ;

    /**
     * BookController constructor.
     * @param BookService $bookService
     * @param JwtService $jwtService
     */
    public function __construct(BookService $bookService, JwtService $jwtService)
    {
        $this->bookServ = $bookService;
        $this->jwtServ = $jwtService;
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     * @throws JwtNoExistsException
     */
    public function indexByUserAuth(Request $request): AnonymousResourceCollection
    {
        $jwtPayload = $this->jwtServ->decodeFromRequest($request)->getPayload();
        $data = $this->bookServ->indexByUser($jwtPayload->data->dn);

        return BookIndexByUserIdResource::collection($data);
    }
}
