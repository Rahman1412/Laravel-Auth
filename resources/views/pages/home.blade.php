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
        Sign Up
    </h3>
</div>

<div class="card p-3">

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->



    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
            <!-- @if($errors->has('first_name'))
            <p class="text-danger">
            {{ $errors->first('first_name') }}
            </p>
            @endif -->

            @error('first_name')
            <p class="text-danger">
            {{ $message }}
            </p>
            @enderror
        </div>


        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
            @error('last_name')
            <p class="text-danger">
            {{ $message }}
            </p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}">
            @error('email')
            <p class="text-danger">
            {{ $message }}
            </p>
            @enderror
        </div>


        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="{{old('password')}}">
            @error('password')
            <p class="text-danger">
            {{ $message }}
            </p>
            @enderror
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" value="{{old('confirm_password')}}">
            @error('confirm_password')
            <p class="text-danger">
            {{ $message }}
            </p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Sign Up</button>
        @if(Route::has('login'))
        <p>Already have an account ? <a href="{{route('login')}}">Login</a></p>
        @endif
    </form>
</div>


@endsection