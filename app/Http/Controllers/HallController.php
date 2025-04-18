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
       $title = '';

       if (request('category')) {
        $category = Category::firstWhere('slug', request('category'));
        $title = 'of ' . $category->name;
       }
       if (request('author')) {
        $author = Author::firstWhere('slug', request('author'));
        $title = 'by ' . $author->name;
       }

       $title = 'Hall ' . $title;
       $books = Book::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString();

       return view('hall', compact('title', 'books'));
    }

    public function detailBook(Book $book)
    {
        $title = $book->name;
        return view('book', compact('title', 'book'));
    }

    public function bookByAuthor(Author $author)
    {
        $title = 'Book by ' . $author->name;
        $books = Book::where('author_id', $author->id)->with(['author', 'category'])->paginate(10);
        // return dd($title);

        return view('hall', compact('title', 'books'));
    }

    public function bookByCategory(Category $category)
    {
        $title = 'Book of ' . $category->name;
        $books = Book::where('category_id', $category->id)->with(['author', 'category'])->paginate(10);
        // return dd($title);

        return view('hall', compact('title', 'books'));
    }
}
