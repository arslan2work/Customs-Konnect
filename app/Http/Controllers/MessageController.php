<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\message;
use App\Events\MessageSend;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
//
//
//
//


    public function user_list(){
        $users = User::latest()->where('id', '!=', auth()->user()->id)->get();
        if(\Request::ajax()){
            return response()->json($users,200);
        }
        return abort(404);
    }

//
//
//
//

    public function user_message($id = null){
        if(!\Request::ajax()){
            return abort(404);
        }
        $user = User::findOrFail($id);
        $messages = $this->message_by_user_id($id);
        return response()->json([
            'messages' => $messages,
            'user' => $user,

        ]);
    }
  
  //
  //
  //
  //

    public function send_message(Request $request){
        if(!$request-> ajax()){
            abort(404);
        }
        if(request()->has('file')){
            $filename  = request('file')->store('chat');
            $message = message:: create([
                'image' => $filename,
                'from' => auth()->user()->id,
                'to' => $request->user_id,
                'type' => 0,
            ]);
            $message = message:: create([
                'image' => $filename,
                'from' => auth()->user()->id,
                'to' => $request->user_id,
                'type' => 0,
            ]);

        }else{
            $message = message:: create([
                'message' => $request->message,
                'from' => auth()->user()->id,
                'to' => $request->user_id,
                'type' => 0,
            ]);
            $message = message:: create([
                'message' => $request->message,
                'from' => auth()->user()->id,
                'to' => $request->user_id,
                'type' => 1,
            ]);
        }
        
        return response()->json($message,201);
    }
    //
    //
    //
    //
    ///
    ///
    ///
    //
    //
    public function delete_single_message($id = null){
        if(!\Request::ajax()){
            return abort(404);
        }
        message::findOrFail($id)->delete();
        return response()->json('deleted',200);
    }
    
    //
    //
    //
    ///
    ///
    ///
    ///
    //
    public function delete_all_message($id = null){
        $messages = $this->message_by_user_id($id);
            foreach ($messages as $value) {
                message::findOrFail($value->id)->delete();
            }
            return response()->json('All deleted', 200);
        
    }
    
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    public function message_by_user_id($id){
        $messages = message::where(function($q) use ($id){
            $q->where('from',auth()->user()->id);
            $q->where('to',$id);
            $q->where('type',0);
        })->orWhere(function($q) use ($id){
            $q->where('from', $id);
            $q->where('to', auth()->user()->id);
            $q->where('type',1);
        })->with('user')->get();
        return $messages;
    }
}
