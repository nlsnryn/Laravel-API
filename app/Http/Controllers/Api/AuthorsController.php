<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorsResource;

class AuthorsController extends Controller
{
    use HttpResponses;

    public function index() {
       return AuthorsResource::collection(Author::all());
    }

    public function store(StoreAuthorRequest $request) {
        
        $request->validated($request->all());

        $author = Author::create([
            'name' => $request->name
        ]);

        return new AuthorsResource($author);
    }

    public function show(Author $author) {
        return new AuthorsResource($author);
    }

    public function update(Request $request, Author $author) {
        
        $request->validated($request->all());

        $author->update([
            'name' => $request->name
        ]);

        return new AuthorsResource($author);
    }

    public function destroy(Author $author) {
        $author->delete();

        return response(null, 204);
    }
}