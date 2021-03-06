<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CakeResource extends JsonResource
{
    /**
     * @param Request $request
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'weight' => $this->weight,
            'value' => $this->value,
            'amount' => $this->amount,
            'interests' => InterestResource::collection($this->whenLoaded('interests')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
