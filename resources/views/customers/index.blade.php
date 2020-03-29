@extends('layouts.app')



@section('content')
    <h1 class="py-3">Customers </h1>

    @can( 'create' , App\Customer::class)
        <div class="row">
            <div class="col-12">
                <!-- for Add data from DB-->
                <a href={{URL::to("customers/create")}} ><button class="btn btn-success ">Create</button></a>
            </div>
        </div>
        @endcan
    <br>



        <!-- Table with panel -->
        <div class="card card-cascade narrower">

            <!--Card image-->
            <div
                class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                <div>
                </div>

                <a href="" class="white-text mx-3">Customer Table</a>

                <div>
                </div>

            </div>
            <!--/Card image-->

            <div class="px-4">

                <div class="table-wrapper">
                    <!--Table-->
                    <table class="table table-hover mb-0">

                        <!--Table head-->
                        <thead class="table-primary">
                        <tr>

                            <th class="th-lg">
                                <a>ID
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Profile
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Customer Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>  <th class="th-lg">
                                <a href="">Company Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Product Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Customer Email
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
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
                    @can('view', $cust)
                        <a href="/customers/{{$cust->id}}">  {{$cust->name}} </a>
                    @endcan

                    @cannot('view' , $cust)
                            {{$cust->name}}
                    @endcannot
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

