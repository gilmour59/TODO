@extends('layouts.app')
@section('content')

@if (count($errors) > 0)
    @foreach ($errors->all() as $error) <!--all() because the object has arrays as values-->
        <div class="alert alert-danger">
            {{$error}} <!-- Errors from validations (not sessions) -->
        </div>
    @endforeach
@endif

    TODO        
    <form action="/todo/create" method="post">
        @csrf
        <div class="form-group row mx-auto">
            <div class="col-sm-3 offset-sm-4">
                <input type="text" name="todo" id="todo" class="form-control form-control-lg col-sm-12" placeholder="Create TODO">
            </div>
            <input class="btn" type="submit" value="lmao">
        </div> 
    </form> 
    @foreach ($todos as $todo)
        <div class="card bg-primary text-white mb-4 mt-4 w-50 mx-auto">
            <div class="card-body">
                {{$todo['todo']}}
            </div>
        </div> 
    @endforeach
@endsection
                    

