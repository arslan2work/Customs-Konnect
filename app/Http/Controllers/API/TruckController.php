<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Truck;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            return Truck::latest()->paginate(5);
          
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
            'truckNumber' => 'required|string|max:191',
            'LicensePlate' => 'required|string',
            'LicenseState' => 'required|string',
        ]);

        return Truck::create([
            'truckNumber' => $request['truckNumber'],
            'Terminal' => $request['Terminal'],
            'LicensePlate' => $request['LicensePlate'],
            'VehicleType' => $request['VehicleType'],
            'LicenseState' => $request['LicenseState']
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
        $truck = Truck::findOrFail($id);
        $this->validate($request,[
            'truckNumber' => 'required|string|max:191',
            'LicensePlate' => 'required|string',
            'LicenseState' => 'required|string',
        ]);
        $truck->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $truck = Truck::findOrFail($id);
        $truck-> delete();
        return ['message' => 'Truck deleted successfully'];
    }

    public function search(){

        if ($search = \Request::get('q')) {
            $truck = Truck::where(function($query) use ($search){
                $query->where('truckNumber','LIKE',"%$search%")
                        ->orWhere('LicensePlate','LIKE',"%$search%");
            })->paginate(5);
        }else{
            $truck = Truck::latest()->paginate(5);
        }

        return $truck;

    }
}
