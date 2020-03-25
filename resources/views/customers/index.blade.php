@extends('layout')


@section('content')
    <h1 class="py-3">Customers </h1>

{{--    @can( 'create' , App\Customer::class)--}}
        <div class="row">
            <div class="col-12">
                <!-- for Add data from DB-->
                <a href={{URL::to("customers/create")}} ><button class="btn btn-success ">Create</button></a>
            </div>
        </div>
{{--        @endcan--}}
    <br>
    <table class="table">

        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Profile</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Product Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>

        <tbody>
        @foreach($customers as $cust)
            <tr>
                <th scope="row">{{$cust->id}}</th>

                <td> @if($cust->image)
                            <div class="col-sm-5"><img src="{{ asset('storage/'. $cust->image) }}" alt="" class="img-thumbnail">
                        </div>
                    @endif
                </td>

                <td>
{{--                    @can('view', $cust)--}}
                        <a href="/customers/{{$cust->id}}">  {{$cust->name}} </a>
{{--                    @endcan--}}

{{--                    @cannot('view' , $cust)--}}
{{--                            {{$cust->name}}--}}
{{--                    @endcannot--}}
                </td>
                <td>
                                        @foreach($cust->Company()->get() as $company )
                                            {{$company->name}}
                                        @endforeach
                                    </td>
                <td>
                                        @foreach($cust->Product()->get() as $product )
                                            {{$product->name}}
                                            @if($product->image)
                                                <div class="row">
                                                    <div class="col-5"><img src="{{ asset('storage/'. $product->image) }}" alt="" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>

                <td>{{ $cust->email }} </td>


        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{ $customers->links() }}
        </div>
    </div>

    @endsection

