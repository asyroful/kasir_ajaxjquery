<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Transactions;
use App\Models\Sales;

class TransactionsController extends Controller
{
    public function saveTotal(Request $request){
        $validator = Validator::make($request->all(),[
            'total' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'FAILED',
                'message' => $validator->errors()
            ]);
        }

        $sales = Sales::create([
            'total' => $request->total
        ]);
        
        if($sales){
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully input data ! !',
                'data' => $sales->id
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }

    public function saveTrx(Request $request){
        $validator = Validator::make($request->all(),[
            'id_barang' => 'required|integer',
            'id_penjualan' => 'required|integer',
            'jumlah' => 'required|integer',
            'sub_total' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'FAILED',
                'message' => $validator->errors()
            ]);
        }

        $transactions = Transactions::create([
            'id_barang' => $request->id_barang,
            'id_penjualan' => $request->id_penjualan,
            'jumlah' => $request->jumlah,
            'sub_total' => $request->sub_total
        ]);

        if($transactions){
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully input data ! !',
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }
}
