@extends('layout')
@foreach( $compans as $comp)

@section('title' ,'Details For : ' . $comp->name)

@section('content')

<div class="row">
    <div class="col-12">

        <div class="card  bg-light mb-3" style="max-width: 70rem;">
            <div class="card-header">Details For {{ $comp->name }}<br>
            </div>
            <div class="card-body">
                <h4 class="card-title">Name</h4>
                <p class="card-text">{{$comp->name}}.</p>
                <a href="/company/{{ $comp->id }}/edit"><button class="btn btn-warning">Edit</button></a>

                <form action="/company/{{ $comp->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
