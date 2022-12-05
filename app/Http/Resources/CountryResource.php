<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'country_id'=> $this->country_id,
            'code' => $this->code,
            'name' => $this->name,
            'full_name' => $this->full_name,
            'continent' => $this->continent->name
        ];
    }
}
