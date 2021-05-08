<?php

namespace App\Http\Controllers;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:owner|Admin|Sales']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sales = Sales::all();
        return view('dashboard.sales.sales', compact('sales'));
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
            'user_name' => 'required',
            'payment' => 'required|numeric',
        ],[

            'user_name.required' =>'name is required',
            'payment.required' =>'payment is required',
            'payment.numeric' =>'payment must be number ',

        ]);

        Sales::create([
            'user_name' => $request->user_name,
            'payment' => $request->payment,


        ]);
        session()->flash('Add', 'Added Successfully  ');
        return redirect('/sales');
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
            'user_name' => 'required',
            'payment' => 'required|numeric',
        ],[

            'user_name.required' =>'name is required',
            'payment.required' =>'payment is required',
            'payment.numeric' =>'payment must be number ',

        ]);

        $sales = Sales::find($id);
        $sales->update([
            'user_name' => $request->user_name,
            'payment' => $request->payment,
        ]);

        session()->flash('edit','Edit Successfully ');
        return redirect('/sales');
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
        Sales::find($id)->delete();
        session()->flash('delete','Deleted Successfully');
        return redirect('/sales');
    }
}
