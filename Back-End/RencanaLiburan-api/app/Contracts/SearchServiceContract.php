<?php

namespace App\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface SearchServiceContract
{
    /**
     * Cari destinasi/paket/hotel/aktivitas berdasarkan kriteria.
     *
     * @param array{
     *   keyword?: string,
     *   location?: string,
     *   date_start?: string,
     *   date_end?: string,
     *   participants?: int,
     *   budget_min?: int,
     *   budget_max?: int,
     *   category?: string,
     *   rating_min?: float,
     *   facilities?: array<int,string>,
     *   page?: int,
     *   per_page?: int,
     * } $filters
     * @return LengthAwarePaginator
     */
    public function search(array $filters): LengthAwarePaginator;

    /**
     * Autocomplete suggestion saat user mengetik (internal DB + Google Places).
     *
     * @param string $query
     * @return Collection<int, array{label:string, place_id:?string, source:string}>
     */
    public function autocomplete(string $query): Collection;

    /**
     * Ambil detail tempat/destinasi dari Google Places API.
     *
     * @param string $placeId
     * @return array<string, mixed>
     *
     * @throws \App\Exceptions\ExternalApiException
     */
    public function getPlaceDetails(string $placeId): array;

    /**
     * Cari paket penerbangan/hotel via Amadeus Travel API.
     *
     * @param array{
     *   origin?: string,
     *   destination: string,
     *   check_in?: string,
     *   check_out?: string,
     *   adults?: int,
     * } $params
     * @return Collection<int, array<string, mixed>>
     *
     * @throws \App\Exceptions\ExternalApiException
     */
    public function searchAmadeusOffers(array $params): Collection;
}
