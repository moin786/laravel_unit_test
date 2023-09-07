<?php

namespace Peal\CorePackages\Suppliers\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'mobile' => $this->mobile,
            'landphone' => $this->landphone,
            'email' => $this->email,
            'contact_person' => $this->contact_person,
            'contact_person_mobile' => $this->contact_person_mobile,
            'contact_person_email' => $this->contact_person_email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
