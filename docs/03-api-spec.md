# API Specification

> Dokumentasikan setiap endpoint yang dikembangkan maupun yang dikonsumsi dari layanan eksternal.
> Salin dan ulangi blok di bawah untuk setiap endpoint tambahan.

---

## 1. Register

**Method:** `POST`

**URL:** `/api/v1/auth/register`

**Deskripsi:** Mendaftarkan akun pengguna baru ke dalam sistem.

**Autentikasi Diperlukan:** `Tidak`

**Sumber:** `Internal System`

**Request Headers:**
```
Content-Type: application/json
```

**Request Body:**
```json
{
  "name": "string",
  "email": "string",
  "password": "string",
  "password_confirmation": "string"
}
```

**Response Sukses (`201 Created`):**
```json
{
  "status": "success",
  "message": "Registrasi berhasil",
  "data": {
    "id": 1,
    "name": "Budi Santoso",
    "email": "budi@example.com",
    "created_at": "2025-06-01T10:00:00Z"
  }
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Validasi gagal",
  "errors": {
    "email": ["Email sudah digunakan"],
    "password": ["Password minimal 8 karakter"]
  }
}
```

---

## 2. Login

**Method:** `POST`

**URL:** `/api/v1/auth/login`

**Deskripsi:** Melakukan autentikasi pengguna dan mengembalikan token akses (Laravel Sanctum).

**Autentikasi Diperlukan:** `Tidak`

**Sumber:** `Internal System`

**Request Headers:**
```
Content-Type: application/json
```

**Request Body:**
```json
{
  "email": "string",
  "password": "string"
}
```

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "data": {
    "token": "1|abcdefghijklmnopqrstuvwxyz",
    "user": {
      "id": 1,
      "name": "Budi Santoso",
      "email": "budi@example.com"
    }
  }
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Email atau password salah"
}
```

---

## 3. Logout

**Method:** `POST`

**URL:** `/api/v1/auth/logout`

**Deskripsi:** Menghapus token akses pengguna yang sedang aktif (logout).

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:** `-`

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "message": "Logout berhasil"
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Token tidak valid atau sudah kedaluwarsa"
}
```

---

## 4. Tambah Komentar

**Method:** `POST`

**URL:** `/api/v1/destinations/{id}/comments`

**Deskripsi:** Menambahkan komentar pada halaman destinasi oleh pengguna yang sedang login.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:**
```json
{
  "content": "string"
}
```

**Response Sukses (`201 Created`):**
```json
{
  "status": "success",
  "message": "Komentar berhasil ditambahkan",
  "data": {
    "id": 12,
    "destination_id": 3,
    "user": {
      "id": 1,
      "name": "Budi Santoso"
    },
    "content": "Tempatnya bagus banget, recommended buat yang suka snorkeling!",
    "created_at": "2025-06-01T09:30:00Z"
  }
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Validasi gagal",
  "errors": {
    "content": ["Komentar tidak boleh kosong"]
  }
}
```

---

## 5. Like / Dislike Destinasi

**Method:** `POST`

**URL:** `/api/v1/destinations/{id}/react`

**Deskripsi:** Memberikan reaksi like atau dislike pada destinasi. Jika user sudah memberi reaksi yang sama sebelumnya, reaksi tersebut dibatalkan (toggle). Jika memberi reaksi berbeda, reaksi sebelumnya diganti.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:**
```json
{
  "type": "like | dislike"
}
```

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "message": "Reaksi berhasil disimpan",
  "data": {
    "destination_id": 3,
    "user_reaction": "like",
    "total_likes": 128,
    "total_dislikes": 4
  }
}
```

**Response Sukses — Reaksi Dibatalkan (`200 OK`):**
```json
{
  "status": "success",
  "message": "Reaksi berhasil dibatalkan",
  "data": {
    "destination_id": 3,
    "user_reaction": null,
    "total_likes": 127,
    "total_dislikes": 4
  }
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Validasi gagal",
  "errors": {
    "type": ["Nilai harus 'like' atau 'dislike'"]
  }
}
```

---

## 6. Simpan / Batalkan Simpan Destinasi

**Method:** `POST`

**URL:** `/api/v1/destinations/{id}/save`

**Deskripsi:** Menyimpan destinasi ke daftar simpanan user. Jika destinasi sudah disimpan sebelumnya, maka akan dibatalkan (toggle).

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:** `-`

**Response Sukses — Disimpan (`200 OK`):**
```json
{
  "status": "success",
  "message": "Destinasi berhasil disimpan",
  "data": {
    "destination_id": 3,
    "is_saved": true
  }
}
```

**Response Sukses — Dibatalkan (`200 OK`):**
```json
{
  "status": "success",
  "message": "Destinasi dihapus dari simpanan",
  "data": {
    "destination_id": 3,
    "is_saved": false
  }
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Destinasi tidak ditemukan"
}
```

---

## 7. Cari Destinasi

**Method:** `GET`

**URL:** `/api/v1/destinations/search`

**Deskripsi:** Mencari destinasi berdasarkan kata kunci. Hasil pencarian dicocokkan dengan nama destinasi, kota, provinsi, dan deskripsi.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Query Parameters:**
```
q        = [string]  — kata kunci pencarian (wajib)
province = [string]  — filter berdasarkan provinsi (opsional)
```

**Request Body:** `-`

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "data": {
    "keyword": "pantai",
    "total": 2,
    "results": [
      {
        "id": 1,
        "name": "Pantai Lampuuk",
        "city": "Aceh Besar",
        "province": "Aceh",
        "total_likes": 95,
        "is_saved": false
      },
      {
        "id": 5,
        "name": "Pantai Iboih",
        "city": "Sabang",
        "province": "Aceh",
        "total_likes": 143,
        "is_saved": true
      }
    ]
  }
}
```

**Response — Tidak Ada Hasil (`200 OK`):**
```json
{
  "status": "success",
  "data": {
    "keyword": "xyz123",
    "total": 0,
    "results": []
  }
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Parameter pencarian tidak boleh kosong"
}
```

---

## 8. Lihat Destinasi Tersimpan

**Method:** `GET`

**URL:** `/api/v1/user/saved`

**Deskripsi:** Mengambil seluruh destinasi yang telah disimpan oleh pengguna yang sedang login, diurutkan berdasarkan waktu penyimpanan terbaru.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:** `-`

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "data": [
    {
      "id": 5,
      "name": "Pantai Iboih",
      "city": "Sabang",
      "province": "Aceh",
      "image_url": "https://example.com/images/iboih.jpg",
      "total_likes": 143,
      "saved_at": "2025-05-28T14:22:00Z"
    },
    {
      "id": 2,
      "name": "Danau Toba",
      "city": "Samosir",
      "province": "Sumatera Utara",
      "image_url": "https://example.com/images/toba.jpg",
      "total_likes": 310,
      "saved_at": "2025-05-20T08:10:00Z"
    }
  ]
}
```

**Response — Belum Ada Simpanan (`200 OK`):**
```json
{
  "status": "success",
  "data": []
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Unauthorized"
}
```

---

## 9. Destinasi Terpopuler

**Method:** `GET`

**URL:** `/api/v1/destinations/popular`

**Deskripsi:** Mengambil daftar destinasi yang paling populer, diurutkan berdasarkan jumlah likes terbanyak. Cocok ditampilkan di halaman beranda sebagai rekomendasi.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Query Parameters:**
```
limit = [integer] — jumlah destinasi yang ditampilkan, default 10 (opsional)
```

**Request Body:** `-`

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "data": [
    {
      "rank": 1,
      "id": 2,
      "name": "Danau Toba",
      "city": "Samosir",
      "province": "Sumatera Utara",
      "image_url": "https://example.com/images/toba.jpg",
      "total_likes": 310,
      "total_saves": 87
    },
    {
      "rank": 2,
      "id": 5,
      "name": "Pantai Iboih",
      "city": "Sabang",
      "province": "Aceh",
      "image_url": "https://example.com/images/iboih.jpg",
      "total_likes": 143,
      "total_saves": 52
    },
    {
      "rank": 3,
      "id": 1,
      "name": "Pantai Lampuuk",
      "city": "Aceh Besar",
      "province": "Aceh",
      "image_url": "https://example.com/images/lampuuk.jpg",
      "total_likes": 95,
      "total_saves": 30
    }
  ]
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Unauthorized"
}
```

---

## 10. Hapus Komentar

**Method:** `DELETE`

**URL:** `/api/v1/destinations/{id}/comments/{comment_id}`

**Deskripsi:** Menghapus komentar milik pengguna sendiri pada suatu destinasi. Pengguna tidak dapat menghapus komentar milik orang lain.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Internal System`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:** `-`

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "message": "Komentar berhasil dihapus"
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "Komentar tidak ditemukan atau bukan milik Anda"
}
```

---


x

## Contoh — Get Current Weather

**Method:** `GET`

**URL:** `/api/v1/weather`

**Deskripsi:** Mengambil data cuaca terkini berdasarkan nama kota yang dikirim sebagai query parameter, dikonsumsi dari OpenWeatherMap API.

**Autentikasi Diperlukan:** `Ya`

**Sumber:** `Third-Party API — OpenWeatherMap`

**Request Headers:**
```
Authorization: Bearer <token>
Content-Type: application/json
```

**Request Body:** `-`

**Response Sukses (`200 OK`):**
```json
{
  "status": "success",
  "data": {
    "city": "Banda Aceh",
    "temperature": 31,
    "condition": "Sunny",
    "humidity": 78
  }
}
```

**Response Gagal:**
```json
{
  "status": "error",
  "message": "City not found or API key invalid"
}
```

---

*(Salin blok template di atas untuk setiap endpoint selanjutnya)*

