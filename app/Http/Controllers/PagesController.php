<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class PagesController extends Controller
{
    public function new(){
        return view('new');
    }

    public function store(Request $request){

        dd($request);
        $this->validate($request, [
            'todo' => 'required'
        ]);

        $todo = new Todo();
        $todo->todo = $request->input('todo');
        $todo->save();

        return redirect('/todos')->with('sucess', 'TODO Added!');
    }
}
