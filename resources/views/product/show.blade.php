@extends('layout')
@foreach( $products as $prod)

    @section('title' ,'Details For : ' . $prod->name)

    @section('content')

<div class="row">
    <div class="col-12">
    <h1>Details For {{ $prod->name }} </h1><br>
                {{--        for edit --}}
        <a href="/company/{{ $prod->id }}/edit"><button class="btn btn-warning">Edit</button></a>
                {{--        for delete--}}
        <form action="/company/{{ $prod->id }}" method="POST">
        @method('DELETE')
        @csrf
            <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
    </div>
</div>



<div class="row">
    <div class="col-2">
        <p><strong>Name</strong>  {{$prod->name}}</p>
        <td> @if($prod->image)
                <div class="col-sm-2"><img src="{{ asset('storage/'. $prod->image) }}" alt="" class="img-thumbnail">
                </div>
            @endif
        </td>
    </div>
</div>
    @endsection
@endforeach

