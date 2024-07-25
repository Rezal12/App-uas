<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'supplier'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('books.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer',
            'published_date' => 'nullable|date',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('books.edit', compact('book', 'categories', 'suppliers'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer',
            'published_date' => 'nullable|date',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
