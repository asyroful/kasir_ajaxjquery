<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    public $timestamps = false;
    protected $fillable = ['id_barang', 'id_penjualan', 'sub_total', 'jumlah'];
}
