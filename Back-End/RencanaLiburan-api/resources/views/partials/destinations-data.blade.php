{{--
    Static sample data for 10 tourist destinations.
    Include this partial (or move to a view composer / controller) wherever $destinations is needed:
    @php($destinations = include resource_path('views/partials/destinations-data.blade.php'))

    For simplicity in this static frontend, each page below defines $destinations inline via @php.
    This file is kept as a reference array you can copy into a controller.
--}}
@php
return [
[
'id' => 1,
'name' => 'Pantai Kuta',
'location' => 'Bali, Indonesia',
'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=800&q=80',
'rating' => 4.8,
'reviews' => 1240,
'price' => 'Rp 3.500.000',
'category' => 'Pantai',
],
[
'id' => 2,
'name' => 'Raja Ampat',
'location' => 'Papua Barat, Indonesia',
'image' => 'https://images.unsplash.com/photo-1573790387438-4da905039392?w=800&q=80',
'rating' => 4.9,
'reviews' => 890,
'price' => 'Rp 8.750.000',
'category' => 'Pulau',
],
[
'id' => 3,
'name' => 'Gunung Bromo',
'location' => 'Jawa Timur, Indonesia',
'image' => 'https://images.unsplash.com/photo-1554995207-c18c203602cb?w=800&q=80',
'rating' => 4.7,
'reviews' => 1560,
'price' => 'Rp 2.250.000',
'category' => 'Gunung',
],
[
'id' => 4,
'name' => 'Santorini',
'location' => 'Yunani',
'image' => 'https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?w=800&q=80',
'rating' => 4.9,
'reviews' => 2310,
'price' => 'Rp 18.500.000',
'category' => 'Internasional',
],
[
'id' => 5,
'name' => 'Kyoto',
'location' => 'Jepang',
'image' => 'https://images.unsplash.com/photo-1545569341-9eb8b30979d9?w=800&q=80',
'rating' => 4.8,
'reviews' => 1980,
'price' => 'Rp 15.200.000',
'category' => 'Internasional',
],
[
'id' => 6,
'name' => 'Labuan Bajo',
'location' => 'Nusa Tenggara Timur, Indonesia',
'image' => 'https://images.unsplash.com/photo-1518544866330-95a0c5fc54ff?w=800&q=80',
'rating' => 4.8,
'reviews' => 760,
'price' => 'Rp 6.900.000',
'category' => 'Pulau',
],
[
'id' => 7,
'name' => 'Paris',
'location' => 'Prancis',
'image' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=800&q=80',
'rating' => 4.7,
'reviews' => 3120,
'price' => 'Rp 22.000.000',
'category' => 'Internasional',
],
[
'id' => 8,
'name' => 'Danau Toba',
'location' => 'Sumatera Utara, Indonesia',
'image' => 'https://images.unsplash.com/photo-1601275712013-2e6a05f0e89d?w=800&q=80',
'rating' => 4.6,
'reviews' => 540,
'price' => 'Rp 2.800.000',
'category' => 'Danau',
],
[
'id' => 9,
'name' => 'Maldives',
'location' => 'Maladewa',
'image' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?w=800&q=80',
'rating' => 5.0,
'reviews' => 1430,
'price' => 'Rp 25.000.000',
'category' => 'Internasional',
],
[
'id' => 10,
'name' => 'Yogyakarta',
'location' => 'Jawa Tengah, Indonesia',
'image' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?w=800&q=80',
'rating' => 4.7,
'reviews' => 2010,
'price' => 'Rp 1.950.000',
'category' => 'Budaya',
],
];
@endphp