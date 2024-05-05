@extends('app')


@section('content')

<div class="card m-4">
  <div class="card-header">Login User</div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Name : </strong> {{$user['name']}}
            </li>
            <li class="list-group-item">
                <strong>Email : </strong> {{$user['email']}}
            </li>
            <li class="list-group-item">
                <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
            </li>
        </ul>
</div>

@endsection