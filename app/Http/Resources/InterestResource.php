<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InterestResource extends JsonResource
{
    /**
     * @param Request $request
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cake' => CakeResource::make($this->whenLoaded('cake'))
        ];
    }
}
