<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return response()->json([
            'success' => true,
            'message' => 'Get all authors successfully',
            'data'    => $authors
        ], 200);
    }

    public function store(Request $request) {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:png,jpg,jepg|max:2048',
            'bio'  => 'required|string',
        ]);

        // 2. Check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. Insert poto
        $image = $request->file('photo');
        $image->store('books', 'public');

        // 4. Insert data
        $author = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio'  => $request->bio,
        ]);

        // 5. response 
        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data'    => $author
        ], 201);
    }
}