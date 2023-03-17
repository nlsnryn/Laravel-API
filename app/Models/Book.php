<?php

namespace App\Models;

use App\Models\Author;
use App\Models\BookAuthor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'publication_year'];
    protected $hidden = ['laravel_through_key', 'created_at', 'updated_at'];

    public function author() {
        return $this->hasManyThrough(Author::class, BookAuthor::class, 'book_id', 'id', 'id', 'author_id');
    }
}