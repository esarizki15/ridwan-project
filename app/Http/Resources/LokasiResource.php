<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LokasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $koordinat = explode(", ", $this->koordinat);
        return [
            $this->nama,
            floatval($koordinat[0]),
            floatval($koordinat[1]),
            $this->id,
            $this->alamat,
            $this->keterangan,
        ];
    }
}
