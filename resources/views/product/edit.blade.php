@extends('layouts.app')


@section('title' ,'Edit Detail For' . $product->name)

@section('content')

    <div class="row">
        <div class="container">
            <div class="card text-white  bg-primary mb-3" style="max-width: 70rem;">

                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
        <h1 class="py-3">Edit Details For {{ $product->name }} </h1>

            <form action={{ URL::to('product/'.$product->id) }} method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('product.form')
                <button type="submit" class="btn btn-success" > Edit Customers</button>
            </form>
        </div>
    </div>
                </div>
            </div>
        </div>
            </div>

@endsection
