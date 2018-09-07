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
        <div class="form-group row align-items-center justify-content-center">
            <div class="col-sm-3">
                <input type="text" name="todo" id="todo" class="form-control form-control-lg col-sm-12" placeholder="Create TODO">
            </div>
            <div class="col-sm-0">
                <input class="btn btn-outline-primary" type="submit" value="Add">    
            </div> 
        </div> 
    </form> 
    @foreach ($todos as $todo)
        <div class="row align-items-center justify-content-center">
            <div class="col-sm-9">
                <div class="card bg-primary text-white mb-4 mt-4">
                    <div class="card-body">
                        {{$todo['todo']}}
                    </div>
                </div> 
            </div>
            <div class="col-sm-3">
                @if (!$todo->completed)
                    <div class="row justify-content-center">
                        <div class="col-sm-0 mr-1">
                            <a href="{{route('todo.edit', ['id' => $todo->id])}}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="col-sm-0 mr-1">
                            <a href="{{route('todo.completed', ['id' => $todo->id])}}" class="btn btn-success">Mark as Completed!</a>
                        </div>
                        <div class="col-sm-0">
                            <a href="{{route('todo.delete', ['id' => $todo->id])}}" class="btn btn-danger">X</a>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <h3><span>Completed!</span></h3>    
                    </div>
                    <hr class="m-0 p-1"/>
                    <div class="row justify-content-center">
                        <div class="col-sm-0 mr-1">
                            <a href="{{route('todo.edit', ['id' => $todo->id])}}" class="btn btn-info">Edit</a>
                        </div>
                        <div class="col-sm-0 mr-1">
                            <a href="{{route('todo.completed', ['id' => $todo->id])}}" class="btn btn-warning">Mark as Not Completed!</a>
                        </div>
                        <div class="col-sm-0">
                            <a href="{{route('todo.delete', ['id' => $todo->id])}}" class="btn btn-danger">X</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
@endsection
                    

