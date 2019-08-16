<?php

namespace App\Http\Resources;

use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MyBookResource extends JsonResource
{
    /**
     * The resource instance.
     *
     * @var mixed
     */
    public $resource = Book::class;

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
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'rating'      => $this->rating,
            'created_at'  => $this->created_at->format('d-m-Y H:i:s'),
            'updated_at'  => $this->updated_at->format('d-m-Y H:i:s'),
        ];
    }
}
