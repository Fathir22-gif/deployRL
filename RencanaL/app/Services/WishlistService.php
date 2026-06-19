<?php

namespace App\Services;

use App\Contracts\WishlistServiceContract;
use App\Models\User;

class WishlistService implements WishlistServiceContract
{
    /**
     * Tambahkan atau hapus item dari wishlist pengguna (toggle).
     *
     * @param User $user
     * @param string $wishlistableType Nama model, mis. "destination", "package"
     * @param int $wishlistableId
     * @return array{is_wishlisted:bool, wishlist_count:int}
     */
    public function toggleWishlist(User $user, string $wishlistableType, int $wishlistableId): array
    {
        // Implementation placeholder
        return [
            'is_wishlisted' => false,
            'wishlist_count' => 0,
        ];
    }

    /**
     * Tambahkan item ke wishlist pengguna.
     *
     * @param User $user
     * @param string $wishlistableType Nama model, mis. "destination", "package"
     * @param int $wishlistableId
     * @return array{is_wishlisted:bool, wishlist_count:int}
     */
    public function addToWishlist(User $user, string $wishlistableType, int $wishlistableId): array
    {
        // Implementation placeholder
        return [
            'is_wishlisted' => true,
            'wishlist_count' => 0,
        ];
    }

    /**
     * Hapus item dari wishlist pengguna.
     *
     * @param User $user
     * @param string $wishlistableType Nama model, mis. "destination", "package"
     * @param int $wishlistableId
     * @return array{is_wishlisted:bool, wishlist_count:int}
     */
    public function removeFromWishlist(User $user, string $wishlistableType, int $wishlistableId): array
    {
        // Implementation placeholder
        return [
            'is_wishlisted' => false,
            'wishlist_count' => 0,
        ];
    }
}
