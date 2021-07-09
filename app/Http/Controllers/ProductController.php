<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();

        return response()->json([
            "message" => "Success",
            "status" => "200 OK",
            "data" => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->active = $request->active;
        $product->description = $request->description;
        $product->save();

        return response()->json([
            "message" => "Success",
            "status" => "200 OK",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);

        if (!$data) {
            return response()->json([
                "message" => "Fail",
                "status" => "404 Not Found",
            ], 404);
        }

        return response()->json([
            "success" => "Success",
            "status" => "200 OK",
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "message" => "Fail",
                "status" => "404 Not Found",
            ], 404);
        }

        $product->name = $request->name ? $request->name : $product->name;
        $product->price = $request->price ? $request->price : $product->price;
        $product->quantity = $request->quantity ? $request->quantity : $product->quantity;
        $product->active = $request->active ? $request->active : $product->active;
        $product->description = $request->description ? $request->description : $product->description;
        $product->save();

        return response()->json([
            "message" => "Success",
            "status" => "200 OK",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                "message" => "Fail",
                "status" => "404 Not Found",
            ], 404);
        }

        Product::destroy($id);

        return response()->json([
            "message" => "Success",
            "status" => "200 OK",
        ]);
    }
}
