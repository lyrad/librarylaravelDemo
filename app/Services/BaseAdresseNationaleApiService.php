<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class BaseAdresseNationaleApiService
{
    private const API_BASE_URI = 'https://api-adresse.data.gouv.fr';

    public function __construct()
    {

    }

    public function search(string $query = ''): Collection
    {
        $response = Http::get(
            self::API_BASE_URI . sprintf('/search/?q=%s', $query),
        );

        $searchResults = collect(Arr::get($response, 'features', []))->map(
            fn (array $item) => Arr::get($item, 'properties'),
        );

        return $searchResults;
    }
}
