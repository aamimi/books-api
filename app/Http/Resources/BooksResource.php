<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'rating'     => $this->rating,
            'author'     => new AuthorResource($this->user),
            'created_at' => $this->created_at->format('d-m-Y H:i:s'),
        ];
    }
}
