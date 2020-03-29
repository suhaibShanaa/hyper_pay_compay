@extends('layout')

@section('title')
    Add New Products
@endsection

@section('content')
    <div class="row">
        <div class="container">
            <div class="card text-white  bg-info mb-3" style="max-width: 70rem;">

                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
    <h1 class="py-3">Add New Products </h1>


    <!-- for Add data from DB-->

    <form action={{url('product/create')}} method="POST"  class="pb-5" enctype="multipart/form-data">
        @include('product.form')
        <button type="submit" class="btn btn-light py-3" > Add Product </button>
    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
