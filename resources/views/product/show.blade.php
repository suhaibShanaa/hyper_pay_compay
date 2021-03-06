@extends('layouts.app')

@foreach( $product as $prod)

    @section('title' ,'Details For : ' . $prod->name)

    @section('content')

        <div class="row">
            <div class="col-12">
                <div class="card  bg-light mb-3" style="max-width: 70rem;">
                    <div class="card-header">Details For {{ $prod->name }}<br>
                    </div>
                    <div class="card-body">


        <p><strong>Name</strong>  {{$prod->name}}</p>
        <td>  @if($prod->image)
                <div class="col-sm-2"><img src="{{ asset('storage/'. $prod->image) }}" alt="" class="img-thumbnail">
                </div>
            @endif
        </td>
                        <br>

                        <a href="/product/{{ $prod->id }}/edit" style="display:inline-block;"><button class="btn btn-warning">Edit</button></a>
                        {{--        for delete--}}
                        <form action="/product/{{ $prod->id }}" method="POST" style="display:inline-block;" >
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" > Delete</button>
                        </form>
                    </div>
                </div>
            </div>
</div>
    @endsection
@endforeach

