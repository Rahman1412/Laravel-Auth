@extends('app')

@section('content')


<style>
    .container-fluid{
        min-width: 100%;
    }
    .card{
        margin:auto;
        width:500px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

<div class="container-fluid bg-dark">
    <h3 class="text-center text-light p-2">
        Sign In
    </h3>
</div>


<div class="card p-3">
    <form action="{{route('register')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Log In</button>
        <p>Don't have an account ? <a href="{{url('/')}}">Sign Up</a></p>
    </form>
</div>

@endsection