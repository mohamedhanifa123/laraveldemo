<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        if(count($products)>0){
            return response()->json([
                'status' =>'true',
                'data' =>$products,
                'message'=>''
            ]);

        }else{
            return response()->json([
                'status'=>'false',
                'data'=>[],
                'message'=>'No Product Found'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product =new Product;
        $product->name =$request->name;
        $product->price =$request->price;
        $proiduct->qty =$request->qty;

        if($product->save()) {
            return response()->json([
                'status'=>'true',
                'data' =>[],
                'message'=>'product saved successfully'
            ]);
        }else{
            return response()->json([
                'status'=>'false',
                'data' =>[],
                'message'=>'product save failed'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product=Product::find($request->id);

        if(!empty($product)){
            return response()->json([
                'status'=>'true',
                'data'=>$product,
                'message' =>''
            ]);
        }else{
            return response()->json([
                'status'=>'false',
                'data'=>[],
                'message' =>'No product found in ID'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product =Product::find($request->id);
        $product->name =$request->name;
        $product->price =$request->price;
        $proiduct->qty =$request->qty;

        if($product->save()) {
            return response()->json([
                'status'=>'true',
                'data' =>[],
                'message'=>'product Updated successfully'
            ]);
        }else{
            return response()->json([
                'status'=>'false',
                'data' =>[],
                'message'=>'product update failed'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product =Product::find($request->id);
        if(!empty($product)){
        if($product->delete()){
            return response()->json([
                'status'=>'true',
                'data' =>[],
                'message'=>'product deleted successfully'
            ]);
        }else{
            return response()->json([
                'status'=>'false',
                'data'=>[],
                'message'=>'product delete failed'
            ]);
        }
            }else{
            return response()->json([
                'status'=>'false',
                'data'=>[],
                'message'=>'product id not found'
            ]);
        }
    
    }
}
