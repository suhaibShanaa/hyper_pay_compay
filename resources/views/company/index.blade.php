@extends('layout')


@section('content')
    <h1>Companies </h1>

    @can('create',App\Company::class)
        <div class="row">
            <div class="col-12">
                <!-- for Add data from DB-->
                <a href={{URL::to("company/create")}} ><button class="btn btn-success "> Create</button></a>

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

            <a href="" class="white-text mx-3">Company Table</a>

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
                            <a href="">Company Name
                                <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>
                        <th class="th-lg">
                            <a href="">Customer Related
                                <i class="fas fa-sort ml-1"></i>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <!--Table head-->
                    <tbody>
                    @foreach($companies as $comp)
                        <tr>
                            <th scope="row">{{$comp->id}}</th>
                            <td>
                                @can('view', $comp)
                                    <a href="/company/{{$comp->id}}">
                                        {{$comp->name}}
                                    </a>
                                @endcan

                                @cannot('view',$comp)
                                    {{$comp->name}}
                                @endcannot
                            </td>


                            <td>
                                @foreach($comp->Customer()->get() as $customer )
                                    <ul>
                                        <li>{{$customer->name}}</li>
                                    </ul>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                    <!--Table body-->
                </table>
                <!--Table-->
            </div>

        </div>

    </div>
    <!-- Table with panel -->




    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{ $companies->links()}}
        </div>
    </div>
@endsection

