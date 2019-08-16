<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\BooksResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return BooksResource::collection(Book::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $book
     *
     * @return BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $book
     *
     * @return void
     */
    public function update(Request $request, $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $book
     *
     * @return void
     */
    public function destroy($book)
    {
        //
    }
}
