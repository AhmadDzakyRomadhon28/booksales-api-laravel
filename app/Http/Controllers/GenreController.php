<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index() {
        $genres = Genre::all();

        return Response()->json([
            "success" => true,
            "message" => "Get all resource",
            "data" => $genres
        ], 200);
    }
}