@extends('layouts.app')
@section('content')

<h1>Contact-US</h1>
@if( ! session()->has('message'))

    <form action="{{ route('contact.store') }}" method="POST">

        {{ method_field('POST') }}
        <label for="name">Name : </label>
        <div class="input-group"  class="pb-2">
            <input type="text" name="name" value="{{ old('name')}}  " class="form-control">
            <div>{{$errors->first('name')}}</div>
        </div>

        <label for="email">Email : </label>
        <div class="input-group" class="pb-2">
            <input type="text" name="email" value="{{ old('email')}}"  class="form-control">
            <div>{{$errors->first('email')}}</div>
        </div>
        <label for="message">Message : </label>
        <div class="input-group" class="pb-2">
            <textarea type="text" name="message" id="message" value=""
                      class="form-control">{{old('message')}}</textarea>
            <div>{{$errors->first('message')}}</div>
        </div>

        <button class="btn btn-primary"> Send Message</button>

        @csrf
    </form>
@endif
@endsection
