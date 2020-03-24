<?php

namespace App\Http\Controllers;

use App\Company;
use App\Product;
use App\Events\NewCustomerHasRegisterdEvent;
use App\Mail\WelcomeNewUserMail;
use App\Mail\WelcomeNewUserMail1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index']); //to skip index
    }

    public function index()
    {
        //
        $products = Product::all();

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $companies = Company::all();
        $prod = new Product();
        return view('product.create', compact('companies','prod'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->input('product');
        $product = Product::create($this->validateRequest());
        $this->storeImage($product);
        $product->save();

        $product->Company()->attach($request->input('product'));

        return redirect('company/index');



    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
        $products = Product::find($products);

        return view('product.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        //

        return view('product.edit', $products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $products
     * @return \Illuminate\Http\Response
     */
    public function update(Product $products)
    {


        $products->update($this->validateRequest());
        $this->storeImage($products);

        $products->request()->input('product');

        return redirect('product/' . $products->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $products)
    {
        //
//        $this->authorize('delete', $products);

        $products->delete();
        return redirect('product/index');

    }

    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:2',
            'category' => '',
            'image' => 'sometimes|file|image|max:5000',

        ]);


    }

    private function storeImage(Product $products)
    {
        if (request()->has('image')) {
            $products->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);

            $image = \Intervention\Image\Facades\Image::make(public_path('storage/' . $products->image))->fit(300, 300, null, 'center');
            $image->save();
        }
    }
}
