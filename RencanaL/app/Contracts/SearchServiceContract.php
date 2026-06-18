<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface SearchServiceContract
{
    public function search(array $filters): LengthAwarePaginator;

    public function autocomplete(string $query): Collection;

    public function getPlaceDetails(string $placeId): array;

    public function searchAmadeusOffers(array $params): Collection;
}