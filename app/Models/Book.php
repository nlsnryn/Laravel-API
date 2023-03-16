<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'publication_year'];

    public function author() {
        return $this->hasManyThrough(Author::class, BookAuthor::class, 'book_id', 'id', 'id', 'author_id');
    }
}
