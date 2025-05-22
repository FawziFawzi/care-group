<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class CheckoutController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|regex:/(01)[0-9]{9}/',
            'address' => 'required|string|max:255',
        ]);
        if ($validator->fails()){
            throw ValidationException::withMessages([
                'phone'=>'Phone number must start with 01 and total of 11 digits',
            ]);
        };
        $attributes = $validator->validated();

        // Getting the items of the cart
        $orderItems = Cart::content()->map(function ($item){
            return [
                'product_id'=>$item->id,
                'product_name'=>$item->name,
                'product_price'=>$item->price,
                'product_quantity'=>$item->qty,
                'product_total_price'=>$item->price * $item->qty,
                'product_image'=>$item->options->image ?? null,
            ];

        })->toArray();
        $totalPrice = Cart::subTotal();

        $order = Order::create([
            'order_number' => 'ORD-' . Str::upper(Str::random(10)),
            'name' => $attributes['name'],
            'phone' => $attributes['phone'],
            'address' => $attributes['address'],
            'order_items' => $orderItems,
            'total_price' => $totalPrice,
        ]);

        // Clear the cart
        Cart::destroy();

        return redirect()->route('order.confirm',$order)->with('success','Order placed successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order )
    {

        return view('order_confirmation', ['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
