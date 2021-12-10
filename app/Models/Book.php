<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'title'];

    /**
     * Get the genres of the book.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }


    /**
     * Get the author of the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);

    }

    /**
     * Get the reviews for the book
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the pages for the book
     */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

}
