@extends('layouts.app')


@section('title' ,'Edit Detail For' . $customer->name)

@section('content')

    <div class="container">
        <div class="card text-white  bg-primary mb-3" style="max-width: 70rem;">

            <div class="row">
                <div class="col-12">
                    <div class="card-body">

        <h1 class="card-title">Edit Details For {{ $customer->name }} </h1>

            <form action={{ URL::to('customers/'.$customer->id) }} method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('customers.form')
                <button type="submit" class="btn btn-light" > Edit Customers</button>
            </form>
        </div>
    </div>

@endsection
