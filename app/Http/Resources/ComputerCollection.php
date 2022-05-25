<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComputerCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'additionalData' => [
                'storeName' => 'SDJ Store',
                'storeComputersLink' => 'http://computerstore.tk/public/computers',
            ],
        ];
    }
}