<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibrarySearchRequest;
use App\Services\LibraryService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class LibrayController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct(private readonly AddressService $addressService)
    {

    }

    public function index()
    {

    }

    public function search(LibrarySearchRequest $request)
    {
        $adresses = $this->addressService->search($request->get('query'));

        dd($adresses);
    }
}
