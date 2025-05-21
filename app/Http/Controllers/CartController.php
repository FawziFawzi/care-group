<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cart');
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
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });
        if ($duplicates->isNotEmpty()){
            return back()->with('success','Item already in your cart!');
        }

        Cart::add($request->id,$request->name,1,$request->price)->associate('App\Models\Product');

        return back()->with('success','Item added to your cart!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $validator = Validator::make($request->all(),[
            'quantity'=> 'required|numeric|between:1,5'
        ]);
        if ($validator->fails()){
            session()->flash('success','Quantity must be between 1 and 5.');
            return response()->json(['success'=>false],Response::HTTP_BAD_REQUEST)  ;
        }

        Cart::update($id, $request->quantity);
        session()->flash('success','Quantity updated!!');
        return response()->json(['success'=>true]);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return back()->with('success','Item has been removed');
    }
}
