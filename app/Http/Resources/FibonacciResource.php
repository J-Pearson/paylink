<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FibonacciResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'results' => $this->results
        ];
    }
}
