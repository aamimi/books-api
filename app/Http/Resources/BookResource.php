<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'author'      => new AuthorResource($this->user),
            'createdAt'  => $this->created_at,
            'updatedAt'  => $this->updated_at,
            'ratings'     => BookRatingsResource::collection($this->ratings),
        ];
    }
}
