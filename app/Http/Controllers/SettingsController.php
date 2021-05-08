<?php

namespace App\Http\Controllers;
use App\Models\Settings;

use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:owner|Admin|Back office']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $settings = Settings::all();
        return view('dashboard.settings.settings', compact('settings'));
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
        $validatedData = $request->validate([
            'sales_user' => 'required',
            'sales_target' => 'required|numeric',
        ],[

            'sales_user.required' =>'name is required',
            'sales_target.required' =>'Sales target is required',
            'sales_target.numeric' =>'Sales target must be number ',

        ]);



        Settings::create([
            'sales_user' => $request->sales_user,
            'sales_target' => $request->sales_target,


        ]);
        session()->flash('Add', 'Added Successfully  ');
        return redirect('/settings');
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
    public function update(Request $request)
    {
        $id = $request->id;

        $validatedData = $request->validate([
            'sales_user' => 'required',
            'sales_target' => 'required|numeric',
        ],[

            'sales_user.required' =>'name is required',
            'sales_target.required' =>'Sales target is required',
            'sales_target.numeric' =>'Sales target must be number ',

        ]);

        $settings = Settings::find($id);
        $settings->update([
            'sales_user' => $request->sales_user,
            'sales_target' => $request->sales_target,
        ]);

        session()->flash('edit','Edit Successfully ');
        return redirect('/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Settings::find($id)->delete();
        session()->flash('delete','Deleted Successfully');
        return redirect('/settings');
    }
}
