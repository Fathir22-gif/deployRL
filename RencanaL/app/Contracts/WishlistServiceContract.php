<?php

namespace App\Contracts;

use App\Models\User;

interface WishlistServiceContract
{
    /**
     * Tambahkan atau hapus item dari wishlist pengguna (toggle).
     *
     * @param User $user
     * @param string $wishlistableType Nama model, mis. "destination", "package"
     * @param int $wishlistableId
     * @return array{is_wishlisted:bool, wishlist_count:int}
     */
    public function toggleWishlist(User $user, string $wishlistableType, int $wishlistableId): array;

    /**
     * Tambahkan item ke wishlist pengguna.
     *
     * @param User $user
     * @param string $wishlistableType Nama model, mis. "destination", "package"
     * @param int $wishlistableId
     * @return array{is_wishlisted:bool, wishlist_count:int}
     */
    public function addToWishlist(User $user, string $wishlistableType, int $wishlistableId): array;

    /**
     * Hapus item dari wishlist pengguna.
     *
     * @param User $user
     * @param string $wishlistableType Nama model, mis. "destination", "package"
     * @param int $wishlistableId
     * @return array{is_wishlisted:bool, wishlist_count:int}
     */
    public function removeFromWishlist(User $user, string $wishlistableType, int $wishlistableId): array;

}
