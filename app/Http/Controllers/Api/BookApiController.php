<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class BookApiController extends Controller
{
    public function index()
    {
        $books = Book::with(['category', 'supplier'])->get();
        return response()->json($books);
    }

    public function show($id)
    {        $book = Book::with(['category', 'supplier'])->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($book);
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

        $book = Book::create($request->all());
        return response()->json($book, Response::HTTP_CREATED); 
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

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
        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        $book->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT); 
    }
}
