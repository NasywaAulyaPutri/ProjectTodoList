@extends('layout')
@section('content')

    <div class="wrapper bg-white col-6 offsest-4">
        
@if (session('notAllowed'))
<div class="alert alert-danger">
    {{ session('notAllowed') }}
</div>
@endif
@if (session('successUpdate'))
<div class="alert alert-success">
    {{ session('successUpdate') }}
</div>
@endif
@if (Session::get('deleted'))
<div class="alert alert-warning">
{{Session::get('deleted')}}
</div>
@endif
@if (Session::get('done'))
<div class="alert alert-success">
{{ Session::get('done')}}
</div>
@endif
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                
                <div class="h5">My Todo's</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a href="{{ url('/todo/create') }}" class="text-success" style="text-decoration: none">Create</a>  <a href=""style="text-decoration: none">Complated</a>
                </span>
            </div>
            <div class="info btn ml-md-4 ml-0">
                <span class="fa fa-info" title="Info"></span>
            </div>
        </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div>
                    <span class="text-muted fas fa-comment btn"></span>
                </div>
                <div class="text-muted">2 todos</div>
                <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
            </div>
        </div>
        <div id="comments" class="mt-1">
            
            @foreach ($todos as $todo)
            <div class="comment d-flex align-items-start justify-content-between">
                <div class="mr-2">
                    @if($todo['status'] == 1)
                    <span class="fa fa-bookmark"></span>
                    @else
                    <form action="{{route('todo.complated', $todo->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="Submit" class="fa fa-check-circle text-primary btn"></button>
                    </form>
                    @endif
                    
                    {{--<label class="option">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>--}}
                </div>
                <div class="d-flex flex-column w-75">
                    <a href="/todo/edit/{{$todo['$id']}}" class="text-justify" style="text-decoration: none">
                        {{$todo['title']}}
                    </b>
                    <p>{{$todo['description']}}</p>

                    <p class="text-muted">
                    {{$todo['status'] == 1 ? 'completed' : 'on-Process'}}
                    <span class="date">
                        @if($todo['status'] == 1)
                        selesai pada : {{ \Carbon\Carbon::parse($todo
                        ['done_time'])->format('j F, Y') }}
                        @else
                        target selesai : {{ \Carbon\Carbon::parse($todo['date'])->format('j F, Y') }}
                        @endif
                    </span>
                    <span class='date'{{\Carbon\Carbon::parse($todo['date'])->format('j F, Y')}}></span></p>
                    
                </div>
                <div class="ml-md-4 ml-0">
                    <form action="{{route('todo.delete', $todo->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="fa fa-trash text-danger btn"></button>
                    </form>
                </div>
            </div>
       @endforeach  
    </div>
</div>
@endsection