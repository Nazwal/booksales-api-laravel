<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
        //mengambil semua data
        $genres = Genre::all();
        //response jika data tidak dittemukan
        if ($genres->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No genres found',
            ], 200);
        }
        //response jika data ditemukan
        return response()->json([
            'success' => true,
            'message' => 'All genres retrieved successfully',
            'data' => $genres
        ], 200);
    }

    public function store(Request $request){
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description'=>'required|string'
        ]);
        //cek validator
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        //insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        //response
        return response()->json([
            'success' => true,
            'message' => 'Genre added successfully',
            'data' => $genre
        ], 201);
    }

    public function show (string $id) {
       //mencari data id
        $genre = Genre::find($id);
        //response jika tidak ditemukan
        if (!$genre){
            return response()->json([
                'succses'=> false,
                'message'=>'resource not found'
            ],400);
        }
        //response jika data ditemukan
        return response()->json([
            'success' => true,
            'message'=> 'Get detail resource',
            'data'=>$genre
        ], 200);
    }

    public function update(Request $request, string $id){
        // mencari data
        $genre= Genre::find($id);
        if (!$genre){
            return response()->json([
                'succses'=> false,
                'message'=>'resource not found'
            ],400);
        }
        // validator
        $validator = Validator::make($request->all(),[
             'name' => 'required|string|max:100',
            'description'=>'required|string'
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
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        //update data ke database
        $genre->update($data);
        return response()->json([
            'success' => true,
            'message'=> 'resource update succesfully',
            'data'=>$genre
        ], 200);
     }

    public function destroy(string $id){
        //mencari data
        $genre = Genre::find($id);
        //respons jika tidak menemukan data
        if (!$genre){
            return response()->json([
                'succses'=> false,
                'message'=>'resource not found'
            ],400);
        }
        //menghapus data yang dicari
        $genre->delete();

        //response jika berhasil delete
        return response()->json([
            'success' => true,
            'message'=> 'Delete resource succesfully',
            'data'=>$genre
        ]);
    }
}
