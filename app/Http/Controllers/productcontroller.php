<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_model;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= product_model::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'class'=>'required',
            'roll'=>'required',
            'contact'=>'required'
        ]);

        product_model::create($request->all());
        return redirect()->route('products.index')->with('succsess','product created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=product_model::findorFail($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product_model::findorFail($id);
        return view('products.edit',compact('product'));
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
        $request->validate([

            'name'=>'required',
            'class'=>'required',
            'roll'=>'required',
            'contact'=>'required'
        ]);

        product_model::findorFail($id)->update($request->all());
        return redirect()->route('products.index')->with('succsess','product created succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product_model::findorFail($id)->delete();
        return redirect()->route('products.index')->with('succsess','product created succesfully');

    }
}
