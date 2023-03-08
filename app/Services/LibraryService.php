<?php

namespace App\Services;

use App\Contracts\LibraryServiceInterface;
use App\Entities\Library;
use App\Repositories\LibraryRepository;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class LibraryService implements LibraryServiceInterface
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly LibraryRepository $libraryRepository,
        private readonly BaseAdresseNationaleApiService $baseAdresseNationaleApiService,
    )
    {

    }

    public function searchLibrary(array $criteria = []): array
    {
        $libraries = $this->libraryRepository->findBy($criteria);

        return $libraries;
    }

    public function createLibrary(
        string $name,
        string $addressHouseNumber,
        string $addressStreet,
        string $addressPostalCode,
        string $addressCity,
    ): Library {
        $library = new Library();
        $library->setName($name);
        $library->setAddressHouseNumber($addressHouseNumber);
        $library->setAddressStreet($addressStreet);
        $library->setAddressPostalCode($addressPostalCode);
        $library->setAddressCity($addressCity);

        $this->entityManager->persist($library);
        $this->entityManager->flush();

        return $library;
    }

    public function searchAddress(string $query = ''): Collection
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
