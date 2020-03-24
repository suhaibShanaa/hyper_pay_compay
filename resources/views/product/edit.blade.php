@extends('layout')

    @section('title' ,'Edit Detail For' . $products->name)

@section('content')

    <div class="row">
        <h1 class="py-3">Edit Details For {{ $products->name }} </h1>
    </div>



    <div class="row">
        <div class="col-12">
            <form action={{ URL::to('product/'.$products->id) }} method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('product.form')
                <button type="submit" class="btn btn-success" > Edit Customers</button>
            </form>
        </div>
    </div>

@endsection
