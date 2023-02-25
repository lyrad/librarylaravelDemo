<?php

namespace App\Http\Controllers;

use App\Contracts\LibraryServiceInterface;
use App\Entities\Library;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class LibraryApiController extends BaseController
{
    public function __construct(
        private readonly LibraryServiceInterface $libraryService,
    )
    {
    }

    public function show(int $id)
    {
        $library = collect($this->libraryService->searchLibrary(['id' => $id]))->first();

        if ($library instanceof Library) {
            return response()->json($library);
        }

        throw new HttpResponseException(
            response()->json('Resource not found', Response::HTTP_NOT_FOUND)
        );
    }
}
