<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customs;

class CustomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customs::latest()->paginate(5);
         
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tripNumber' => 'required|string|max:191',
        ]);

        return Customs::create([
            'tripNumber' => $request['tripNumber'],
            'portOfEntry' => $request['portOfEntry'],
            'query' => $request['query'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Customs::findOrFail($id);
        
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Customs::findOrFail($id);
        $user-> delete();
        return ['message' => 'ACI deleted successfully'];
    }
    public function search(){

        if ($search = \Request::get('q')) {
            $users = Customs::where(function($query) use ($search){
                $query->where('tripNumber','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $users = Customs::latest()->paginate(5);
        }

        return $users;

    }
}
