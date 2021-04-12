<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    
    /**
     * Show all product.
     */
    public function allProduct()
    {
        $products = Product::where('active', 1)->orderBy('id', 'DESC')->paginate(12);
        $categories = Category::all();

        return view('products.products', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Show product by category.
     */
    public function viewByCategory($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $products = $category->products()->where('active', 1)->orderBy('id', 'DESC')->paginate(12);

        return view('products.products', [
            'products' => $products, 
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    /**
     * Search product by keyword.
     */
    public function viewBySearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::where([
                            ['name', 'LIKE', '%'.$keyword.'%'],
                            ['active', 1]
                        ])->paginate(12);
        $categories = Category::all();

        return view('products.products', [
                'products' => $products, 
                'categories' => $categories,
        ]);
    }
    
    /**
     * Show product details.
     */
    public function viewProduct($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Category::find($product->category_id)->products()->where('id', '!=', $id)
                                                                ->inRandomOrder()->take(4)->get();

        return view('products.details', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
    
}