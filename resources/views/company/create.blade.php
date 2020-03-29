@extends('layouts.app')

@section('title')
    Add New Companies
@endsection

@section('content')
    <div class="row">
        <div class="container">
            <div class="card text-white  bg-success mb-3" style="max-width: 70rem;">
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
    <h1>Add New Company </h1>
    <!-- for Add data from DB-->
    <form action={{url('company/create')}} method="POST"  class="pb-5">

    @include('company/form')
        <button type="submit" class="btn btn-light"> Add Company </button>

    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
