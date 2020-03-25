@extends('layout')


@section('content')
    <h1 class="py-3">Products </h1>

{{--    @can( 'create' , App\Product::class)--}}
        <div class="row">
            <div class="col-12">
                <!-- for Add data from DB-->
                <a href={{URL::to("product/create")}} ><button class="btn btn-success ">Create</button></a>
            </div>
        </div>
{{--        @endcan--}}
    <br>
    <table class="table">

        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Image</th>
        </tr>
        </thead>

        <tbody>
        @foreach($products as $prodc)
            <tr>
                <th scope="row">{{$prodc->id}}</th>
                <td><a href="/product/{{$prodc->id}}">  {{$prodc->name}} </a></td>
                <td>{{ $prodc->category }} </td>

                <td> @if($prodc->image)
                    <div class="col-sm-2"><img src="{{ asset('storage/'. $prodc->image) }}" alt="" class="img-thumbnail">
                        </div>
                @endif
                </td>
        </tr>
        @endforeach
        </tbody>
    </table>

{{--    <div class="row">--}}
{{--        <div class="col-12 d-flex justify-content-center pt-4">--}}
{{--            {{ $errors->links() }}--}}
{{--        </div>--}}
{{--    </div>--}}

    @endsection

