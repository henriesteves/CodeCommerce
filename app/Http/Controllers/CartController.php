<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        //dd(Session::get('cart'));

        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);

        if(isset($product->images->first()->id)){
            $image = $product->images->first()->id . '.' . $product->images->first()->extension;
        }
        else{
            $image = null;
        }

        $cart->add($id, $product->name, $product->price, $image);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');
    }

    public function removeItem($id)
    {
        $cart = $this->getCart();

        $product = Product::find($id);

        $cart->removeItem($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();

        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        return $cart;
    }
}
