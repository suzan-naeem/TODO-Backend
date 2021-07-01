<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{   

    public function index(){
        $todos = Todo::all();

        return response()->json([
            'status'=> 200,
            'todos'=>$todos,
        ]);
    }

    public function store(Request $request){
        $todo = new Todo;
        $todo->task = $request->input('task');
        $todo->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Task Added Successfully',
        ]);
    }

    public function edit($id){
        $todo = Todo::find($id);
        
        return response()->json([
            'status'=> 200,
            'todo'=> $todo,
        ]);
    }

    public function update(Request $request,$id){
        $todo = Todo::find($id);
        $todo->task = $request->input('task');
        $todo->update();

        return response()->json([
            'status'=> 200,
            'message'=>'Task Updated Successfully',
        ]);
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json([
            'status'=> 200,
            'message'=>'Task Deleted Successfully',
        ]);
    }


}
