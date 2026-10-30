<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $image->store('authors', 'public');

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

    public function show(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource Not Found'

            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $author
        ], 200);
    }

    public function update(string $id, Request $request) {
        // 1. mencari data
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource Not Found'

            ], 404);
        }

        // 2. validator 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'photo' => 'nullable|image|mimes:png,jpg,jepg|max:2048',
            'bio'  => 'required|string'
            ]);

            if($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
            ], 422);
        }

        // 3. siapkan data yang ingin di update
        $data = [
            'name' => $request->name,
            'bio'  => $request->bio,
        ];


        // 4. handle image (upload & delete image)
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image ->store('authors', 'public'); 

            if($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] =$image->hashName();
        }
    

        // 5. update data baru ke database
        $author->update($data); 
        
        return response()->json([
            'success' => true,
            'message' => 'Resource update successfully!',
            'data' => $author
        ], 201);
    }

    public function destroy(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource Not Found'

            ], 404);
        }

        if ($author->photo) {
            // Detele from storage
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete Resource Successfuly!'
        ]);
    }
}