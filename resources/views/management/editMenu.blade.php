@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-sm-8" style="font-size:18px">
            <i class="fas fa-hamburger"></i> Edit a Menu
            <hr>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $errors)
                    <li>{{$errors}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/management/menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="menuName">Menu Name</label>
                    <input type="text" name="name" class="form-control" value="{{$menu->name}}" placeholder="Menu...">
                </div>
                <label for="menuPrice">Price</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="price" class="form-control" value="{{$menu->price}}" aria-label="Amount(to the nearest dollor)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <label for="MenuImage">Image</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file" id="inputFroupFile01">
                        <label id="filename" class="custom-file-label" for="inputFroupFile01">Choose File</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" name="description" value="{{$menu->description}}" class="form-control" placeholder="Description....">
                </div>

                <div class="form-group">
                    <label for="Category">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$menu->category_id === $category->id ? 'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<script>
const actualBtn = document.getElementById('inputFroupFile01');

const fileChosen = document.getElementById('filename');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
</script>
@endsection