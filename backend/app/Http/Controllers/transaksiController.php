<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Stock;
use Validator;
use App\Resources\transactionResource;

class transaksiController extends Controller
{
    
    public function index()
    {
        $data = Transaction::latest()->get();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully get data !',
            'data' => $data
        ]);
    }
   
    public function store(Request $request)
    {
        
        return response()->json([
            'status' => 200,
            'message' => 'Successfully insert data !',
            'data' => $data
        ]);
    }

    public function update(Request $request, Stock $stock)
    {
        $validator = Validator::make($request->all(),[
            'nama_barang' => 'required|string',
            'harga' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $stock->nama_barang = $request->nama_barang;
        $stock->harga = $request->harga;
        $stock->save();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully update data !',
            'data' => $data
        ]);
    }

    public function destroy(Stock $Stock)
    {
        $stock->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully delete data with id !'
        ]);
    }
}

