<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return Response()->json([
            "success" => true,
            "message" => "Get all resource",
            "data" => $books
        ], 200);
    }
}