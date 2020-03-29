@extends('layout')

@section('title')
    Add New Customers
@endsection


@section('content')
    <div class="row">
        <div class="container">
            <div class="card text-white  bg-info mb-3" style="max-width: 70rem;">

                <div class="row">
                    <div class="col-12">
                        <div class="card-body">

    <h1 class="py-3">Add New Customers </h1>

    <!-- for Add data from DB-->
    <form action={{url('customers/create')}} method="POST"  class="pb-5" enctype="multipart/form-data">
        @include('customers.form')
        <button type="submit" class="btn btn-light py-3 " > Add Customer </button>
        <a href="{{url('/pay')}}"><p class="border-warning "> Pay by Credit </p></a>
    </form>

    <hr>
    </div>
    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
