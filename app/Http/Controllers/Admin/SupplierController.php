<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Supplier::first();
        $data = Supplier::get();
        return view('admin.supplier.index', compact(
            'data',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::get();
        return view('admin.supplier.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $Supplier = new Supplier();
        $Supplier->user_id = Auth::User()->id;
        $Supplier->name = $data['name'];
        $Supplier->save();
        return redirect('admin/supplier')->with('success','successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $Supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::get();
        $data = Supplier::find($id);
        return view('admin.supplier.edit', compact('supplier', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $Supplier = Supplier::find($id);
        $Supplier->name = $data['name'];
        $Supplier->save();

        // return redirect()->back();
        return redirect('admin/supplier')->with('success','successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Supplier::find($id)->delete();
        return redirect()->back();
    }
}
