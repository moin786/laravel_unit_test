<?php

namespace Peal\CorePackages\Category\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Peal\CorePackages\SubCategory\Models\SubCategory;

class CategoryResource extends JsonResource
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
            'child' => new SubCategory($this->child()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
