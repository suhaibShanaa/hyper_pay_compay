<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']); //to skip index
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
;
        $products= Product::orderBy('created_at','desc')->get();
        return view('product.index' ,compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products =Product::all();
        $product = new Product();
        return view('product.create' ,compact('products' , 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->input('product');
        $product = Product::create($this->validateRequest());
        $this->storeImage($product);
        $product->save();


        return redirect('product/index')->with('success' , 'Done Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        $product = Product::find($product);

        return view('product.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $products  =    Product::all();

        return view('product.edit' ,compact('product','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->update($this->validateRequest());
        $this->storeImage($product);

        $product->save();


        return redirect('product/'.$product->id)->with('success' , 'Done Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return  redirect('product/index')->with('success' , 'Done Successfully Deleted');
    }


    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:2',
            'category' => 'required|',
            'image'=> 'sometimes|file|image|max:5000',
        ]);


    }

    private function storeImage(Product $product)
    {
        if (request()->has('image')){
            $product->update([
                'image' =>request()->image->store('uploads', 'public'),
            ]);

            $image =\Intervention\Image\Facades\Image::make(public_path('storage/' . $product->image))->fit(300,300 , null , 'center');
            $image->save();
        }
    }

}



