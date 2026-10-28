<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();

        return Response()->json([
            "success" => true,
            "message" => "Get all resource",
            "data" => $authors
        ], 200);
    }
}