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
    public function show (string $id) {
        $author = Author::find($id);

        if (!$author){
            return response()->json([
                'succses'=> false,
                'message'=>'resource not found'
            ],400);
        }

        return response()->json([
            'success' => true,
            'message'=> 'Get detail resource',
            'data'=>$author
        ], 200);
    }
    public function update(Request $request, string $id){
        // mencari data
        $author= Author::find($id);
        if (!$author){
            return response()->json([
                'succses'=> false,
                'message'=>'resource not found'
            ],400);
        }
        // validator
        $validator = Validator::make($request->all(),[
             'nama' => 'required|string|max:100',
        ]);
        //cek validator
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        //menyiapkan data yang ingin di update
        $data = [
            'nama'=>$request->nama,
        ];
        //update data ke database
        $author->update($data);
        return response()->json([
            'success' => true,
            'message'=> 'resource update succesfully',
            'data'=>$author
        ], 200);
     }

    public function destroy(string $id){
        $author = Author::find($id);
        if (!$author){
            return response()->json([
                'succses'=> false,
                'message'=>'resource not found'
            ],400);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message'=> 'Delete resource succesfully',
            'data'=>$author
        ]);
    }
}
