<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(Request $request){

        return Todo::latest()->paginate();
    }

    public function store(Request $request){
        
        if(!$request-> ajax()){
            abort(404);
        }
        $items = Todo::create([
            'item' => $request->item
        ]);
        
        
        return response()->json($items,201);
    }
}
