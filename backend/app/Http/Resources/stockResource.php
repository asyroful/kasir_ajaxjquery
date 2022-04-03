<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class stockResource extends JsonResource
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
            'id_barang' => $this->id_barang,
            'nama_barang' => $this->nama_barang,
            'harga' => $this->harga
        ];
    }
}
