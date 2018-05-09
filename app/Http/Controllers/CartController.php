<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('checkout', ['cart' => session()->get('cart')]);
    }

    public function addToCart(Product $product, $quantity)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            if (array_key_exists($product->id, $cart['products'])) {
                $cart['total_price']                           = bcadd($cart['total_price'], ($calc = round($product->price, 2) * $quantity), 2);
                $cart['total_qtty']                            += $quantity;
                $cart['products'][$product->id]->cart_quantity += $quantity;
                session(['cart' => $cart]);
            } else {
                $product->cart_quantity         = $quantity;
                $cart['total_price']            = bcadd($cart['total_price'], (round($product->price, 2) * $quantity), 2);
                $cart['total_qtty']             += $quantity;
                $cart['products'][$product->id] = $product;
                session(['cart' => $cart]);
            }
        } else {
            $product->cart_quantity         = $quantity;
            $cart['products'][$product->id] = $product;
            $cart['total_price']            = round($product->price, 2) * $quantity;
            $cart['total_qtty']             = $quantity;
            session(['cart' => $cart]);
        }
    }

    public function removeFromCart(Product $product)
    {
        $cart                = session()->get('cart');
        $cart['total_price'] = bcsub($cart['total_price'], ($product->price * $cart['products'][$product->id]->cart_quantity), 2);
        $cart['total_qtty']  -= $cart['products'][$product->id]->cart_quantity;
        unset($cart['products'][$product->id]);
        session(['cart' => $cart]);
    }
}
