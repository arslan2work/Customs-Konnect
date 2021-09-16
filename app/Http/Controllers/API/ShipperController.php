<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Shipper;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
            
            return Shipper::latest()->paginate(5);
       // $this->authorize('isAdmin');

    
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
            'name' => 'required|string|max:191',
            'type' => 'required|string|max:191',
        ]);

        return Shipper::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'address' => $request['address'],
            'city' => $request['city'],
            'state' => $request['state'],
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
        $shipper = Shipper::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'type' => 'required|string|max:191',
        ]);
        $shipper->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $shipper = Shipper::findOrFail($id);
        $shipper-> delete();
        return ['message' => 'Shipper deleted successfully'];
    }

    public function search(){

        if ($search = \Request::get('q')) {
            $shipper = SHipper::where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                        ->orWhere('type','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $shipper = Shipper::latest()->paginate(5);
        }

        return $shipper;

    }
}
