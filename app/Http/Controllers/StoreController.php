<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $category;
    private $product;
    private $tag;

    public function __construct(Category $category, Product $product, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
    }

    public function index()
    {
        //$pFeatured = Product::where('featured', '=', 1)->get();
        $pFeatured = $this->product->featured()->get();

        $pRecommend = $this->product->recommend()->get();

        $categories = $this->category->all();

        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    //Página de Categoria
    public function category($id)
    {
        $categories = $this->category->all();

        $category = $this->category->find($id);

        //$products = $category->products;
        //$products = $this->product->ofCategory($id)->get();
        $products = $this->product->ofCategory($id)->paginate(6);

        return view('store.category', compact('categories', 'category', 'products'));
    }

    // Página de Produto
    public function product($id)
    {
        $categories = $this->category->all();

        $product = $this->product->find($id);

        $tags = $product->tags;

        return view('store.product', compact('categories', 'product', 'tags'));
    }

    // Página de tag
    public function tag($id)
    {
        $categories = $this->category->all();

        $tag = $this->tag->find($id);

        $products = $tag->products;

        return view('store.tag', compact('categories', 'tag', 'products'));
    }
}
