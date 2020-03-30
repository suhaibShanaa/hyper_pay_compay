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
        <br>
        <label for="email">Email : </label>
        <div class="input-group" class="pb-2">
            <input type="text" name="email" value="{{ old('email')}}"  class="form-control">
            <div>{{$errors->first('email')}}</div>
        </div>
        <br>

        <label for="summary-ckeditor">Message : </label>
        <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor" value="{{old('summary-ckeditor')}}"></textarea>
            <div>{{$errors->first('summary-ckeditor')}}</div>



        <button class="btn btn-primary"> Send Message</button>

        @csrf
    </form>

@endif
@endsection
