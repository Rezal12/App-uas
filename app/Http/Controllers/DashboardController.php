<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $booksOutOfStock = Book::where('stock', 0)->count();
        $recentBooks = Book::latest()->take(5)->get(); // Latest 5 book
        $totalSuppliers = Supplier::count(); // Add this lines

        return view('home.index', compact('totalBooks', 'totalCategories', 'booksOutOfStock', 'recentBooks', 'totalSuppliers'));
    }
}
