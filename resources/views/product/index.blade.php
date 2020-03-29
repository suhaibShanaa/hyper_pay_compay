@extends('layouts.app')



@section('content')
    <h1 class="py-3">Products </h1>

    @can( 'create' , App\Product::class)
        <div class="row">
            <div class="col-12">
                <!-- for Add data from DB-->
                <a href={{URL::to("product/create")}} ><button class="btn btn-success ">Create</button></a>
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

                <a href="" class="white-text mx-3">Product Table</a>

                <div>
                </div>

            </div>
            <!--/Card image-->

            <div class="px-4">

                <div class="table-wrapper">
                    <!--Table-->
                    <table class="table table-hover mb-0">

                        <!--Table head-->
                        <thead>
                        <tr>

                            <th class="th-lg">
                                <a>ID
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Product Name
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                            <th class="th-lg">
                                <a href="">Category
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>     <th class="th-lg">
                                <a href="">Image
                                    <i class="fas fa-sort ml-1"></i>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <!--Table head-->
        <tbody>
        @foreach($products as $prodc)
            <tr>
                <th scope="row">{{$prodc->id}}</th>
                <td>
                    @can('view', $prodc)
                        <a href="/product/{{$prodc->id}}">  {{$prodc->name}} </a>
                    @endcan
                    @cannot('view' , $prodc)
                        {{$prodc->name}}
                    @endcannot
                </td>

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

