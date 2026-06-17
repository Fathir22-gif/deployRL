<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session('wishlist', []);

        return view('wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        $wishlist = session()->get('wishlist', []);

        $wishlist[] = [
            'name' => $request->name,
            'country' => $request->country,
            'rating' => $request->rating,
            'budget' => $request->budget,
            'description' => $request->description,
            'route' => $request->route,
        ];

        session()->put('wishlist', $wishlist);

        return redirect()->back();
    }

    public function remove($index)
    {
        $wishlist = session()->get('wishlist', []);

        if (isset($wishlist[$index])) {
            unset($wishlist[$index]);
        }

        session()->put('wishlist', array_values($wishlist));

        return redirect()->back();
    }
}
