@extends('layout')

    @section('title' ,'Edit Detail For' . $company->name)

@section('content')

    <div class="container">
        <div class="card text-white  bg-info mb-3" style="max-width: 70rem;">

        <div class="row">
        <div class="col-12">
            <div class="card-body">

            <h1 class="card-title">Edit Details For {{ $company->name }} </h1>
            <form action={{ URL::to('company/'.$company->id) }} method="POST">

                @method('PUT')
                @include('company.form')


                <button type="submit" class="btn btn-light" > Edit Companies</button>
            </form>
        </div>
        </div>
            </div>
        </div>
    </div>





@endsection
