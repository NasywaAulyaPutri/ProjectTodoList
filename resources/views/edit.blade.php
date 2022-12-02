@extends('layout')
@section('content')
<div class="container content">  
    
    @if ($errors->any())
    <div class="alert alert-danger">
        

    <form id="create-form" action="{{route('todo.store')}}" method="POST">
        @csrf
      <h3>Edit Todo</h3>
      @method('PATCH')
      <fieldset>
          <label for="">Title</label>
        
          <input placeholder="title of todo" type="text" name="title" value="{{ $todo['title'] }}">
      </fieldset>
      <fieldset>
          <label for="">Target Date</label>
          <input placeholder="Target Date" type="date" name="name" value="{{ $todo['date'] }}">
      </fieldset>
      <fieldset>
          <label for="">Description</label>
          {{-- Karena textarea tidak termasuk tag input , untuk menampilkan value nya di
            pertengahan (sebelum penutup tag </textarea)--}}
          <textarea name="Description" tabindex="5" name="description"></textarea>
      </fieldset>
      <fieldset>
          <button type="submit" id="contactus-submit">Submit</button>
      </fieldset>
      <fieldset>
          <a href="/todo/" class="btn-cancel btn-lg btn">Cancel</a>
      </fieldset>
    
    </form>
  </div>
@endsection