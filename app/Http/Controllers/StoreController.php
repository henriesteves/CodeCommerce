<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $category;

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
        //$pFeatured = Product::where('featured', '=', 1)->get();
        $pFeatured = $this->product->featured()->get();

        $pRecommend = $this->product->recommend()->get();

        $categories = $this->category->all();

        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $categories = $this->category->all();

        $category = $this->category->find($id);

        $products = $category->products;

        return view('store.category', compact('categories', 'products'));
    }
}
