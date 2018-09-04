<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index(){
        $todos = Todo::all();

        /*
        $data = array(
            'title' => 'services Title',
            'test' => 'test',
            'arrayTest' => ['item1', 'item2', 'item3']
          );

            @foreach ($todos as $key=>$value)
                {{$key}}
            @endforeach
            @foreach ($todos['arrayTest'] as $key=>$value)
                {{$key}}
                {{$value}}
            @endforeach

        $data['arrayTest'][0]; 
        */

        return view('todo')->with('todos', $todos);
    }
    
    public function store(Request $request){

        $this->validate($request, [
            'todo' => 'required'
        ]);

        $todo = new Todo();
        $todo->todo = $request->input('todo');
        $todo->save();

        return redirect('/todos')->with('sucess', 'TODO Added!');
    }
}
