<label for="name">Name : </label>
<div class="input-group"  class="pb-2">
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}  " class="form-control">
    <div>{{$errors->first('name')}}</div>
</div>

<label for="email">Email : </label>
<div class="input-group" class="pb-2">
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}"  class="form-control">
    <div>{{$errors->first('email')}}</div>
</div>

<label for="company_id">Company : </label>
<div class="form-group" >

    <select name="company_s[]"   id="company_id"  class="form-control" multiple>
        <option value="" disabled>Select Company</option>
        @foreach( $companies as $comp)
            <option value={{$comp->id}}>{{$comp->name}}</option>
{{--            <option value={{$comp->id == 'id' ? 'selected' : ''}}>   {{$comp->name}}</option>   for show selected is in form --}}
        @endforeach
    </select>
</div>


<label for="product_id">Product : </label>
<div class="form-group" >
    <select name="product_s[]"   id="product_id"  class="form-control" multiple>
        <option value="" disabled>Select Product</option>
        @foreach( $products as $prod)
            <option value={{$prod->id}}>{{$prod->name}} {{$prod->image}}</option>
        @endforeach
    </select>
</div>

<label for="image">Profile Image : </label>
<div class="form-group d-flex flex-column">
    <input type="file" name="image" class="py-3">
    <div>{{$errors->first('image')}}</div>
</div>

@csrf

<br>
