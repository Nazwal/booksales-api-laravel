<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $author = Author::all();

        if ($author->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No author found',
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'All author retrieved successfully',
            'data' => $author
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:100'
        ]);        

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $author = Author::create([
            'nama' => $request->nama
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Author added successfully',
            'data' => $author
        ], 201);
    }
}
