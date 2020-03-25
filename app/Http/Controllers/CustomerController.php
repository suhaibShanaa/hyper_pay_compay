<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisterdEvent;
use App\Mail\WelcomeNewUserMail;
use App\Mail\WelcomeNewUserMail1;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Image;

class CustomerController extends Controller
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
        $customers = Customer::with('Company','Product')->paginate(10);

        return view('customers.index', ['customers' =>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies  =   Company::all();
        $products   =   Product::all();
        $customer   =   new Customer();

        return view('customers.create' , compact('companies','customer','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $this->authorize('create' , Customer::class);
//        $this->authorize('create', [Customer::class, Auth::user()]);

        $request->input('company');
        $request->input('product');
        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);
        $customer->save();

        //MUST after Save because Define
        $customer->Company()->attach($request->input('company_s'));
        $customer->Product()->attach($request->input('product_s'));

//        //message Mail
        event(new NewCustomerHasRegisterdEvent($customer));
        return redirect('customers/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
        $customer = Customer::find($customer);

        return view('customers.show' , compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        $companies =    Company::all();
        $products  =    Product::all();

        return view('customers.edit' ,compact('customer' ,'companies' ,'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update( Customer $customer)
    {


        $customer->update($this->validateRequest());
        $this->storeImage($customer);

        $customer->Company()->sync(request()->input('company_s'));
        $customer->Product()->sync(request()->input('product_s'));

        return redirect('customers/'.$customer->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
//        $this->authorize('delete',$customer);

        $customer->delete();
        return  redirect('customers/index');

    }

    private function validateRequest()
    {
                return request()->validate([
                'name' => 'required|min:2',
                'email' => 'required|email',
                'image'=> 'sometimes|file|image|max:5000',
                ]);


    }

    private function storeImage(Customer $customer)
    {
        if (request()->has('image')){
            $customer->update([
               'image' =>request()->image->store('uploads', 'public'),
            ]);

            $image =\Intervention\Image\Facades\Image::make(public_path('storage/' . $customer->image))->fit(300,300 , null , 'center');
            $image->save();
        }
    }
}
