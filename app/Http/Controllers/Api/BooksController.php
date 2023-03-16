<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BooksResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $request->validated($request->all());

        $book = Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'publication_year' => $request->publication_year
        ]);

        return new BooksResource($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BooksResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validated($request->all());

        $book->update([
            'name' => $request->name,
            'description' => $request->description,
            'publication_year' => $request->publication_year
        ]);

        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, 204);
    }
}