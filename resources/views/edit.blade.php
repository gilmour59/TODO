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
    <form action="{{route('todo.update', ['id' => $todos->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group row align-items-center justify-content-center">
            <div class="col-sm-6">
                <textarea class="form-control" name="todo" id="todo" rows="5">{{$todos->todo}}</textarea>
            </div>
            <div class="col-sm-0">
                <input class="btn btn-outline-primary" type="submit" value="Update">
            </div>
        </div> 
    </form> 
@endsection
                    

