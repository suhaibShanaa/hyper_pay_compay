@extends('layout')

@section('title')
    Add New Products
@endsection

@section('content')

    <h1 class="py-3">Add New Products </h1>


    <!-- for Add data from DB-->

    <form action={{url('product/create')}} method="POST"  class="pb-5" enctype="multipart/form-data">
        @include('product.form')
        <button type="submit" class="btn btn-primary py-3" > Add Product </button>
    </form>

@endsection
