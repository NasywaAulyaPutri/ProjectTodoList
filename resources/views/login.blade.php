@extends('layout')
@section('content')



@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('notAllowed'))
    <div class="alert alert-danger">
        {{ session('notAllowed') }}
    </div>
@endif
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-4">

                <div class="card o-hidden border-0 shadow-lg my-5" style="background: #ffffff9c">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row"> 
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900">Login</h1>
                                        <p>Please Login</p>
                                    </div><link rel="stylesheet" href="login.css">
                                    <form class="user" action="{{route('auth')}}" method="POST">
                                        @csrf
                                        <div class="mt-3">
                                        <h5> Email </h5>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" name="email">
                                            
                                        </div>
                                        <div class="form-group" style="margin-bottom: 30px">
                                            <h5 class=mt-2> Password </h5>
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                
                                        <button type="submit" class="btn btn-primary" style="width: 100%">Submit
                                        </button>
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="{{ url('/register')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    {{-- @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(session::get('error'))
    <div class="alert alert-danger">
        {{session::get('error')}}</div>
        @endif
        <ul>
            @foreach ($errors->all() as $error) <li> {{$error}}</li>
                
            @endforeach --}}
@endsection