<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class LibraryService
{
    public function __construct(private readonly BaseAdresseNationaleApiService $baseAdresseNationaleApiService)
    {

    }

    public function search(string $query = ''): Collection
    {
        // Retrieve, filter and normalize API responses.
        $apiSearchResponse = $this->baseAdresseNationaleApiService
            ->search($query)
            ->filter(fn (array $item) => Arr::get($item, 'type') === 'housenumber')
            ->map(fn (array $item) => [
                'housenumber' => Arr::get($item, 'housenumber'),
                'street' => Arr::get($item, 'street'),
                'postcode' => Arr::get($item, 'postcode'),
                'city' => Arr::get($item, 'city'),
            ]);

        return $apiSearchResponse;
    }
}
