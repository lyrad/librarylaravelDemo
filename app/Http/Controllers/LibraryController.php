<?php

namespace App\Http\Controllers;

use App\Contracts\LibraryServiceInterface;
use App\Http\Requests\LibrarySearchAddressRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class LibraryController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(private readonly LibraryServiceInterface $libraryService)
    {

    }

    public function index()
    {

    }

    public function searchAddress(LibrarySearchAddressRequest $request)
    {
        $adresses = $this->libraryService->searchAddress($request->get('query'));

        dd($adresses);
    }
}
