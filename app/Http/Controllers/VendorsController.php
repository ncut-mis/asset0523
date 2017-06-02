<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Http\Requests;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::orderBy('created_at', 'DESC')->get();
        $data = ['vendors' => $vendors];
        return view('admin.vendors.index', $data);
    }

    public function create()
    {
        return view('admin.vendors.create');
    }

    public function edit($id)
    {
        $vendors = Vendor::find($id);
        $data = ['vendors' => $vendors];

        return view('admin.vendors.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $vendors = Vendor::find($id);
        $vendors ->update($request->all());

        return redirect()->route('admin.vendors.index');
    }

    public function store(Request $request)
    {
        Vendor::create($request->all());
        return redirect()->route('admin.vendors.index');
    }

    public function destroy($id)
    {
        Vendor::destroy($id);
        return redirect()->route('admin.vendors.index');
    }
    public function show(Request $request)
    {
        $Search =$request->input('Search');
        $vendors = Vendor::orderBy('created_at', 'DESC')
            ->when($Search, function ($query) use ($Search) {
                return $query->where('name', 'like','%'.$Search.'%');
            })->get();
        $data=['vendors'=>$vendors];
        return view('admin.vendors.index' ,$data);
    }

}
