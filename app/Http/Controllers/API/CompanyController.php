<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Company;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Company::latest()->paginate(5);
       
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
            'companyName' => 'required|string|max:191'
        ]);

        return Company::create([
            'companyName' => $request['companyName'],
            'city' => $request['city'],
            'state' => $request['state'],
            'user_id' => $request['user_id']
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
        $driver = Company::findOrFail($id);
        $this->validate($request,[
            'companyName' => 'required|string|max:191'
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

        $driver = Company::findOrFail($id);
        $driver-> delete();
        return ['message' => 'Driver deleted successfully'];
    }

    public function search(){

        if ($search = \Request::get('q')) {
            $driver = Company::where(function($query) use ($search){
                $query->where('companyName','LIKE',"%$search%");
            })->paginate(5);
        }else{
            $driver = Company::latest()->paginate(5);
        }

        return $driver;

    }
    public function users(){
        return auth()->user();
    }
}
