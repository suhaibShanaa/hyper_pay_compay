<label for="name">Name : </label>
<div class="input-group"  class="pb-2">
    <input type="text" name="name" value="{{ old('name') ?? $prod->name }}  " class="form-control">
    <div>{{$errors->first('name')}}</div>
</div>

<label for="category">Category : </label>
<div class="input-group" class="pb-2">
    <input type="text" name="category" value="{{ old('category') ?? $prod->category }}"  class="form-control">
    <div>{{$errors->first('category')}}</div>
</div>

<label for="image">Product Image : </label>
<div class="form-group d-flex flex-column">
    <input type="file" name="image" class="py-3">
    <div>{{$errors->first('image')}}</div>
</div>

@csrf

<br>
