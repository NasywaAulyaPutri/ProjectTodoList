@extends('layout')

@section('content')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-4">

                <div class="card o-hidden border-0 shadow-lg my-5" style="background: #ffffff9c">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row"> 
                            <div class="col-lg">
                                <div class="pt-5 px-5 pb-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900">Register</h1>
                                        <p>Please register</p>
                                    </div>
                                    <form class="user" method="post" action="{{route('register-akun')}}">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <input type="name" class="form-control form-control-user" id="exampleInputName" name="name" placeholder="Name">
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="Username" class="form-control form-control-user" id="exampleInputUsername" name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="Email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Email">
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="password">
                                        </div>
                                        
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="width: 70%; margin-left:15%;">Submit
                                        </button>
                                        {{-- <a href="{{ url('home')}}" class="btn btn-primary btn-user btn-block mt-4">
                                            Login
                                        </a> --}}
                                    </form>
                                    <hr>
                                
                                    <div class="text-center">
                                        <a class="small" href="/">Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    
</body>



@endsection