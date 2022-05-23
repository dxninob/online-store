<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComputerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'cpu' => $this->getCpu(),
            'ram' => $this->getRam(),
            'storage' => $this->getStorage(),
            'storage' => $this->getStorage(),
            'Categories' => $this->getCategories()->pluck('name'),
        ];
    }
}
