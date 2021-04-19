@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-sm-8" style="font-size:18px">
            <i class="fas fa-chair"></i> Create a Table
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
            <form action="/management/table" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tableName">Table Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Table...">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection