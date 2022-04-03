<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Validator;
use App\Resource\stockResource;

class stockController extends Controller
{
    public function showToken() {
        echo csrf_token(); 
  
    }

    public function index()
    {
        $stock = Stock::query()->paginate(10);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully get data !',
            'data' => $stock
        ]);
    }
   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_barang' => 'required|string',
            'harga' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $stock = Stock::create([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully insert data !',
            'data' => $stock
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
            'data' => $stock
        ]);
    }

    public function edit(Stock $Stock)
    {
        $stock = Stock::findOrFail($Stock->id_barang = $Stock->id);
        return response()->json([
            'status' => 200,
            'message' => 'Successfully get data with id !',
            'data' => $stock
        ]);
    }

    public function destroy(Stock $Stock)
    {
        $stock = Stock::findOrFail($Stock->id_barang = $Stock->id);
        $stock->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully delete data with id !'
        ]);
    }

    public function search($katakunci)
    {
        $stock = Stock::where('nama_barang', 'LIKE', '%'. $katakunci .'%')->get();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully search data with id !',
            'data' => $stock
        ]);
    }
}
