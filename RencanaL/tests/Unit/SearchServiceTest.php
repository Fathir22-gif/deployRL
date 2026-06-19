<?php

use App\Services\SearchService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

test('search mengembalikan paginator', function () {
    $service = new SearchService();

    $result = $service->search([]);

    expect($result)->toBeInstanceOf(LengthAwarePaginator::class);
});

test('autocomplete mengembalikan collection', function () {
    $service = new SearchService();

    $result = $service->autocomplete('Bal');

    expect($result)->toBeInstanceOf(Collection::class);
    expect($result->first()['label'])->toBe('Bali');
});

test('getPlaceDetails mengembalikan array', function () {
    $service = new SearchService();

    $result = $service->getPlaceDetails('123');

    expect($result)->toBeArray();
});

test('searchAmadeusOffers mengembalikan collection', function () {
    $service = new SearchService();

    $result = $service->searchAmadeusOffers([]);

    expect($result)->toBeInstanceOf(Collection::class);
});