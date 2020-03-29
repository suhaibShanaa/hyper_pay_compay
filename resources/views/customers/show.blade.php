@extends('layout')
@foreach( $customer as $cust)

@section('title' ,'Details For' . $cust->name)

@section('content')

<div class="row">
    <div class="col-12">
            <div class="card  bg-light mb-3" style="max-width: 70rem;">
                <div class="card-header">Details For {{ $cust->name }}<br>
                </div>
                <div class="card-body">

        <p><strong>Name</strong>  {{$cust->name}}</p>
        <p><strong>Email</strong>  {{$cust->email}}</p>
        <p><strong>Company</strong> <br>
            @foreach($cust->Company()->get() as $company )
                {{$company->name}}
            @endforeach
        </p>

        @if($cust->image)
            <div class="row">
                <div class="col-12"><img src="{{ asset('storage/'. $cust->image) }}" alt="" class="img-thumbnail">
                </div>
            </div>
        @endif
        @endforeach

                    <a href="/customers/{{ $cust->id }}/edit"><button class="btn btn-warning">Edit</button></a>
                    <form action="/customers/{{ $cust->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"> Delete</button>
                    </form>

                </div>
            </div>
    </div>
</div>
@endsection



