@extends('layout')
@foreach( $products as $prodc)

@section('title' ,'Details For' . $prodc->name)

@section('content')
<hr>
<div class="row">
    <div class="col-12">
    <h1 class="py-3">Details For {{ $prodc->name }} </h1>
    <br>
{{--        for edit --}}


        <a href="/product/{{ $prodc->id }}/edit"><button class="btn btn-warning">Edit</button></a>


{{--        for delete--}}

        <form action="/product/{{ $prodc->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
    </div>
</div>



<div class="row">
    <div class="col-2">

        <p><strong>Name</strong>  {{$prodc->name}}</p>
        <p><strong>Category</strong>  {{$prodc->category}}</p>

        @if($prodc->image)
            <div class="row">
                <div class="col-12"><img src="{{ asset('storage/'. $prodc->image) }}" alt="" class="img-thumbnail">
                </div>
            </div>
        @endif
        @endforeach
    </div>
</div>



@endsection
