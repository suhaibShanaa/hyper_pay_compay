<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $companies= Company::orderBy('created_at','desc')->get();
        $companies =Company::with('customer')->paginate(10);
        return view('company.index' ,compact('companies','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $companies =Company::all();
        $company = new Company();
        return view('company.create' ,compact('companies' , 'company'));
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
        $this->authorize('create' , Company::class);


        $request->input('company');
        $company = new Company();
        $company->name =request('name');

        $company->save();
        return redirect('company/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

        $compans = Company::find($company);
        return view('company.show' , compact('compans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        return view('company.edit' ,compact('company' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company)
    {
        //
        $this->authorize('update' , Company::class);

        $company->update(request()->post());
//
        return redirect('company/'.$company->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {

        $this->authorize('delete',$company);
        $company->delete();
        return  redirect('company/index');

    }
}
