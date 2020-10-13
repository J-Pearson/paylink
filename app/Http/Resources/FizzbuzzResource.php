<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FizzbuzzResource extends JsonResource
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
            'first'   => $this->first,
            'last'    => $this->last,
            'results' => $this->results
        ];
    }
}
