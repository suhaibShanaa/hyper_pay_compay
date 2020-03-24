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
    <table class="table">

        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Company Name</th>
            <th scope="col">Customer Related</th>
        </tr>
        </thead>

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
    </table>


    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{ $companies->links()}}
        </div>
    </div>
@endsection

