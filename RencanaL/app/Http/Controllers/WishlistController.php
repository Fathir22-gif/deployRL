<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = session('wishlist', []);
        $totalFavorites = count($wishlistItems);
        $countries = collect($wishlistItems)
            ->pluck('location')
            ->unique()
            ->values()
            ->all();

        return view('wishlist', compact('wishlistItems', 'totalFavorites', 'countries'));
    }

    public function add(Request $request)
    {
        $destination = $request->validate([
            'destination' => 'required|string',
        ])['destination'];

        $item = $this->findDestination($destination);

        if (! $item) {
            return back()->with('error', 'Destinasi tidak valid.');
        }

        $wishlist = collect(session('wishlist', []));

        if ($wishlist->contains('route', $item['route'])) {
            return back()->with('info', 'Destinasi sudah ada di wishlist.');
        }

        $wishlist->push($item);
        session(['wishlist' => $wishlist->all()]);

        return back()->with('success', 'Destinasi berhasil ditambahkan ke wishlist.');
    }

    public function remove(string $route)
    {
        $wishlist = collect(session('wishlist', []));
        $updated = $wishlist->reject(fn ($item) => $item['route'] === $route)->values();

        session(['wishlist' => $updated->all()]);

        return back()->with('success', 'Destinasi berhasil dihapus dari wishlist.');
    }

    private function destinations(): array
    {
        return [
            ['name' => 'Bali', 'location' => 'Indonesia', 'rating' => 4.8, 'image' => 'images/bali.jpg', 'route' => 'bali'],
            ['name' => 'Raja Ampat', 'location' => 'Indonesia', 'rating' => 4.9, 'image' => 'images/raja-ampat.jpg', 'route' => 'raja-ampat'],
            ['name' => 'Paris', 'location' => 'Prancis', 'rating' => 4.9, 'image' => 'images/paris.jpg', 'route' => 'paris'],
            ['name' => 'Tokyo', 'location' => 'Jepang', 'rating' => 4.9, 'image' => 'images/tokyo.jpg', 'route' => 'tokyo'],
        ];
    }

    private function findDestination(string $route): ?array
    {
        return collect($this->destinations())->firstWhere('route', $route);
    }
}
