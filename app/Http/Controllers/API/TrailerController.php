<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Trailer;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trailer::latest()->paginate(5);
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
            'trailerNumber' => 'required|string|max:191',
        ]);

        return Trailer::create([
            'trailerNumber' => $request['trailerNumber'],
            'terminal' => $request['terminal'],
            'trailerType' => $request['trailerType'],
            'licensePLate' => $request['licensePLate'],
            'LicenseState' => $request['LicenseState'],
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
        $trailer = Trailer::findOrFail($id);
        $this->validate($request,[
            'trailerNumber' => 'required|string|max:191',
        ]);
        $trailer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $trailer = Trailer::findOrFail($id);
        $trailer-> delete();
        return ['message' => 'Trailer deleted successfully'];
    }

    public function search(){

        if ($search = \Request::get('q')) {
            $trailer = Trailer::where(function($query) use ($search){
                $query->where('trailerNumber','LIKE',"%$search%");
            })->paginate(5);
        }else{
            $trailer = Trailer::latest()->paginate(5);
        }

        return $trailer;

    }
}
