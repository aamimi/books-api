<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     * @throws Exception
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'fullName'  => $this->full_name,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
