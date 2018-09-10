<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index(){
        //$todos = Todo::all();
        $todos = Todo::orderBy('created_at', 'desc')->get();

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

        return redirect()->route('todos')->with('success', 'TODO Added!');
    }

    public function destroy($id){
        
        $todo = Todo::find($id);

        $todo->delete();
        return redirect()->route('todos')->with('success', 'Deleted');
    }

    public function edit($id){

        $todo = Todo::find($id);

        return view('edit')->with('todos', $todo);

    }

    public function update(Request $request, $id){
        
        $this->validate($request, [
            'todo' => 'required'
        ]);

        $todo = Todo::find($id);

        $todo->todo = $request->input('todo');
        $todo->save();
        
        return redirect()->route('todos')->with('success', 'TODO Updated!');
    }

    public function completed($id){
        
        $todo = Todo::find($id);

        if(!$todo->completed){
            $todo->completed = 1;
        }else{
            $todo->completed = 0;
        }

        $todo->save();

        return redirect()->route('todos')->with('success', 'Marked!');   
    }
}
