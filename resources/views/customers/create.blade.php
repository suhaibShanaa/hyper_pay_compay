@extends('layout')

@section('title')
    Add New Customers
@endsection

@section('content')

    <h1 class="py-3">Add New Customers </h1>


    <!-- for Add data from DB-->

    <form action={{url('customers/create')}} method="POST"  class="pb-5" enctype="multipart/form-data">
        @include('customers.form')
        <button type="submit" class="btn btn-primary py-3" > Add Customer </button>
    </form>

@endsection
