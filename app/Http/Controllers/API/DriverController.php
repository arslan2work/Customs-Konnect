<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
            return Driver::latest()->paginate(5);
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
            'fullName' => 'required|string|max:191',
            'employeeNumber' => 'required|string|max:191',
            'documentNumber' => 'required|string|max:191',
        ]);

        return Driver::create([
            'fullName' => $request['fullName'],
            'employeeNumber' => $request['employeeNumber'],
            'gender' => $request['gender'],
            'citizenship' => $request['citizenship'],
            'documentNumber' => $request['documentNumber'],
            'type' => $request['type'],
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
        $driver = Trailer::findOrFail($id);
        $this->validate($request,[
            'fullName' => 'required|string|max:191',
            'empployeeNumber' => 'required|string|max:191',
            'documentNumber' => 'required|string|max:191',
        ]);
        $driver->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $driver = Driver::findOrFail($id);
        $driver-> delete();
        return ['message' => 'Driver deleted successfully'];
    }

    public function search(){

        if ($search = \Request::get('q')) {
            $driver = Driver::where(function($query) use ($search){
                $query->where('fullName','LIKE',"%$search%")
                        ->orWhere('documentNumber','LIKE',"%$search%");
            })->paginate(5);
        }else{
            $driver = Driver::latest()->paginate(5);
        }

        return $driver;

    }
}
