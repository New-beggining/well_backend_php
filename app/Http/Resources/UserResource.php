<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var User $this */
        return [
            'id'         => $this->id,
            'email'      => $this->email,
            'name'       => $this->name,
            'phone'      => $this->phone,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}