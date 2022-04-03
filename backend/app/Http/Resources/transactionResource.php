<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class transactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_penjualan' => $this->id_barang,
            'total_penjualan' => $this->nama_barang,
        ];
    }
}
