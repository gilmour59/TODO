@extends('layouts.app')
@section('content')
    TODO        
    <form action="/todo/create" method="post">
        @csrf
        <div class="form-group row">
            <div class="col-lg-6 offset-lg-3">
                <input type="text" name="todo" id="todo" class="form-control input-lg" placeholder="Create TODO">
                <input type="submit" value="lmao">
            </div>
        </div> 
    </form> 
    @foreach ($todos as $todo)
        <div class="card bg-primary text-white">
            <div class="card-body">
                {{$todo['todo']}}
                <br>
            </div>
        </div> 
    @endforeach
@endsection
                    

