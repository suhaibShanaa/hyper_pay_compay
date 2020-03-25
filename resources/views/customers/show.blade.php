@extends('layout')
@foreach( $customer as $cust)

@section('title' ,'Details For' . $cust->name)

@section('content')
<hr>
<div class="row">
    <div class="col-12">
    <h1 class="py-3">Details For {{ $cust->name }} </h1>
    <br>
{{--        for edit --}}


        <a href="/customers/{{ $cust->id }}/edit"><button class="btn btn-warning">Edit</button></a>


{{--        for delete--}}

        <form action="/customers/{{ $cust->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
    </div>
</div>



<div class="row">
    <div class="col-2">

        <p><strong>Name</strong>  {{$cust->name}}</p>
        <p><strong>Email</strong>  {{$cust->email}}</p>
        <p><strong>Company</strong> <br>
            @foreach($cust->Company()->get() as $company )
                {{$company->name}}
            @endforeach</p>

        @if($cust->image)
            <div class="row">
                <div class="col-12"><img src="{{ asset('storage/'. $cust->image) }}" alt="" class="img-thumbnail">
                </div>
            </div>
        @endif
        @endforeach
    </div>
</div>
@endsection



