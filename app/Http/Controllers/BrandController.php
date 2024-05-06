<?php

namespace App\Http\Controllers;

use App\Models\Brand;

/**
 *
 */
class BrandController extends Controller
{
    /**
     * @var Brand
     */
    private Brand $brand;

    /**
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Display a listing of brands.
     * @response [
     * {
     * "id": 1,
     * "name": "accusantium",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 2,
     * "name": "est",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 3,
     * "name": "exercitationem",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 4,
     * "name": "quia",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 5,
     * "name": "vero",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 6,
     * "name": "culpa",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 7,
     * "name": "qui",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 8,
     * "name": "voluptas",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 9,
     * "name": "temporibus",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 10,
     * "name": "et",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 11,
     * "name": "in",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 12,
     * "name": "iure",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 13,
     * "name": "rem",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 14,
     * "name": "natus",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 15,
     * "name": "explicabo",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 16,
     * "name": "reprehenderit",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 17,
     * "name": "dolor",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 18,
     * "name": "debitis",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 19,
     * "name": "occaecati",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 20,
     * "name": "voluptatem",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 21,
     * "name": "voluptatibus",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 22,
     * "name": "aut",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 23,
     * "name": "eveniet",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 24,
     * "name": "autem",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 25,
     * "name": "similique",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 26,
     * "name": "maxime",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 27,
     * "name": "facilis",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 28,
     * "name": "accusamus",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 29,
     * "name": "ratione",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 30,
     * "name": "ipsam",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 31,
     * "name": "veniam",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 32,
     * "name": "doloribus",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 33,
     * "name": "sint",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 34,
     * "name": "rerum",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 35,
     * "name": "velit",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 36,
     * "name": "cumque",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 37,
     * "name": "nihil",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 38,
     * "name": "dolorem",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 39,
     * "name": "sunt",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 40,
     * "name": "officiis",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 41,
     * "name": "eius",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 42,
     * "name": "corporis",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 43,
     * "name": "quaerat",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 44,
     * "name": "facere",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 45,
     * "name": "fugiat",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 46,
     * "name": "labore",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 47,
     * "name": "omnis",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 48,
     * "name": "laborum",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 49,
     * "name": "dignissimos",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 50,
     * "name": "excepturi",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 51,
     * "name": "ad",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 52,
     * "name": "blanditiis",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 53,
     * "name": "quos",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 54,
     * "name": "fugit",
     * "is_active": 1,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 55,
     * "name": "consectetur",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 56,
     * "name": "beatae",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 57,
     * "name": "itaque",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 58,
     * "name": "quibusdam",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 59,
     * "name": "cupiditate",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * },
     * {
     * "id": 60,
     * "name": "id",
     * "is_active": 0,
     * "created_at": "2024-05-04T08:50:23.000000Z",
     * "updated_at": "2024-05-04T08:50:23.000000Z"
     * }
     * ]
     */
    public function index()
    {
        return response()->json($this->brand->all());
    }

}
