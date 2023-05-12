<?php

namespace App\Http\Controllers;

use App\Contracts\BaseAdresseNationaleApiServiceInterface;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;

class AddressApiController extends BaseController
{
    public function __construct(
        private readonly BaseAdresseNationaleApiServiceInterface $baseAdresseNationaleApiService,
    )
    {
    }

    // TODO: Pass query route parameter as FormRequest, improve validation (lenght, allowed chars).
    public function search(string $query)
    {
        $addresses = $this->baseAdresseNationaleApiService
            ->search($query)
            ->filter(fn (array $item) => Arr::get($item, 'type') === 'housenumber')
            ->map(fn (array $item) => [
                'housenumber' => Arr::get($item, 'housenumber'),
                'street' => Arr::get($item, 'street'),
                'postcode' => Arr::get($item, 'postcode'),
                'city' => Arr::get($item, 'city'),
            ])
            ->values()
            ->toArray()
        ;

        return response()->json($addresses);
    }
}
