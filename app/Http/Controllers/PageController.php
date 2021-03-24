<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class PageController extends Controller
{
    /**
     * Homepage
     */
    public function home()
    {
        $products = Product::where('active', 1)->inRandomOrder()->take(5)->get();
        $categories = Category::all();

        return view('home', ['products' => $products, 'categories' => $categories]);
    }

    public function organizer()
    {
        return view('organizer');
    }

}
