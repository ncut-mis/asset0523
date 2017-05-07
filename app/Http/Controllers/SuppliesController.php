<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;

use App\Http\Requests;

class SuppliesController extends Controller
{
    //
    public function index()
    {
        $supply = Supply::orderBy('created_at', 'DESC')->get();
        $data = ['supply' => $supply];
        return view('admin.supplies.index', $data);
    }

    public function create()
    {
        return view('admin.supplies.create');
    }

    public function edit($id)
    {
        $supply = Supply::find($id);
        $data = ['supply' => $supply];

        return view('admin.supplies.edit', $data);
    }

    public function update(SupplyRequest $request, $id)
    {
        $supply = Supply::find($id);
        $supply->update($request->all());

        return redirect()->route('admin.supplies.index');
    }

    public function store(SupplyRequest $request)
    {
        Supply::create($request->all());
        return redirect()->route('admin.supplies.index');
    }

    public function destroy($id)
    {
        Supply::destroy($id);
        return redirect()->route('admin.supplies.index');
    }
}