<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::with(['user', 'book'])->get();
        return response()->json($data);
    }


    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
        'order_number' => 'required',
        'customer_id' => 'required|exists:users,id',
        'book_id' => 'required|exists:books,id',
        'total_amount' => 'required|numeric',
    ]);

    $transaction = Transaction::create($validatedData);

    return response()->json([
        'success' => true,
        'message' => 'Transaction created successfully',
        'data' => $transaction
    ], 201);
    
     }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transactions = Transaction::with(['user', 'book'])->findOrFail($id);
        return response()->json($transactions);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transactions = Transaction::findOrFail($id);

        $validated = $request->validate([
            'total_amount' => 'nullable|numeric|min:0',
        ]);

        $transactions->update($validated);
        return response()->json([
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $transactions,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->delete();
        return response()->json(['message' => 'Transaksi berhasil dihapus']);
    }
}
