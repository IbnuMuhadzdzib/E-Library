<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $title = 'Hall';
        $books = Book::with(['author', 'category'])->latest()->paginate(9); // Include relationships

        return view('hall', compact('title', 'books'));
    }

    public function detailBook(Book $book)
    {
        $title = $book->name;
        return view('book-detail', compact('title', 'book')); // Ensure a proper view file
    }

    public function hallAuthor(Author $author)
    {
        $title = 'Books by ' . $author->name;
        $books = Book::where('author_id', $author->id)->with(['author', 'category'])->paginate(9);

        return view('hall', compact('title', 'author', 'books'));
    }

    public function hallCategory(Category $category)
    {
        $title = 'Books in ' . $category->name;
        $books = Book::where('category_id', $category->id)->with(['category', 'author'])->paginate(9);

        return view('hall', compact('title', 'category', 'books'));
    }
}

