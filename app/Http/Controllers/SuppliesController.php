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
        $supplies = Supply::orderBy('created_at', 'DESC')->get();
        $data = ['supplies' => $supplies];
        return view('admin.supplies.index', $data);
    }

    public function create()
    {
        return view('admin.supplies.create');
    }

    public function edit($id)
    {
        $supplies = Supply::find($id);
        $data = ['supplies' => $supplies];

        return view('admin.supplies.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $supplies = Supply::find($id);
        $supplies->update($request->all());

        return redirect()->route('admin.supplies.index');
    }

    public function store(Request $request)
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