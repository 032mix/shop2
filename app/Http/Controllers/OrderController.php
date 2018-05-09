<?php

namespace App\Http\Controllers;

use App\Mail\OrderDetails;
use App\Order;
use App\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty(session()->get('cart.products'))) {
            return redirect('/');
        }
        return view('order-address', ['cart' => session()->get('cart')]);
    }

    public function indexAdmin()
    {
        return view('admin.orders', ['orders' => Order::orderBy('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty(session()->get('cart.products'))) {
            return redirect('/');
        }

        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'city' => 'required',
            'address' => 'required'
        ]);

        $order = Order::create([
            'first_name' => $request['fname'],
            'last_name' => $request['lname'],
            'phone_num' => $request['phone'],
            'email' => $request['email'],
            'delivery_type' => $request['delivery'],
            'city' => $request['city'],
            'address' => $request['address'],
            'status' => 1,
            'order_num' => (round(microtime(true)) + rand(1, 111111))
        ]);

        foreach (session('cart.products') as $product) {
            $order->products()->attach($product->id, ['quantity' => $product->cart_quantity, 'price' => $product->price]);
        }

        session()->forget('cart');

//        Mail::to($user)->send(new OrderDetails($user));

        return view('order-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order               $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    public function changeStatus()
    {
        if (request()->ajax()) {
            $order         = Order::find(request('id'));
            $order->status = request('status');
            $order->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
