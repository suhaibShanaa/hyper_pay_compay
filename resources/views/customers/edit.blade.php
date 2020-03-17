@extends('layout')

    @section('title' ,'Edit Detail For' . $customer->name)

@section('content')

    <div class="row">
        <h1 class="py-3">Edit Details For {{ $customer->name }} </h1>
    </div>



    <div class="row">
        <div class="col-12">
            <form action={{ URL::to('customers/'.$customer->id) }} method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('customers.form')
                <button type="submit" class="btn btn-success" > Edit Customers</button>
            </form>
        </div>
    </div>

@endsection
