<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'full_name'  => $this->full_name,
            'created_at' => $this->created_at->format('d-m-Y H:i:s'),
        ];
    }
}
