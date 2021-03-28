@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('management.inc.sidebar')
        <div class="col-sm-8">
            <i class="fas fa-users"></i> User
            <a href="/management/user/create" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i>
                Create User</a>
            <hr>
            @if(Session()->has('status'))
            <div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert">X</button>
                {{Session()->get('status')}}
            </div>
            @endif
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thread>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="/management/user/{{$user->id}}/edit" 
                                class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                            <form action="/management/user/{{$user->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection