<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = vendor::orderBy('created_at', 'DESC')->get();
        $data = ['vendors' => $vendors];
        return view('admin.vendors.index', $data);
    }

    public function create()
    {
        return view('admin.vendors.create');
    }

    public function edit($id)
    {
        $vendors = vendor::find($id);
        $data = ['vendors' => $vendors];

        return view('admin.vendors.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $vendors = vendor::find($id);
        $vendors ->update($request->all());

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
    public function show(Request $request)
    {
        $Search =$request->input('Search');
        $supplies = Supply::orderBy('created_at', 'DESC')
            ->when($Search, function ($query) use ($Search) {
                return $query->where('name', 'like','%'.$Search.'%');
            })->get();
        $data=['supplies'=>$supplies];
        return view('admin.supplies.index' ,$data);
    }
    public function receive()
    {
        return view('admin.receive.create');
    }
    public function receivestore(Request $request)
    {
        Receive::create($request->all());
        return redirect()->route('admin.supplies.index');
    }
    public function receiveedit(Requests\SupplyRequest $request,$id)
    {
        $supplies = Supply::find($id);
        $receives=Receive::find($id);

        $titles = DB::table('supplies')->lists('quantity');

        foreach ($titles as $title) {
            echo $title;
        }
        $date1 =['receives'=>$receives];
        $data2 = ['supplies' => $supplies];

        $supplies->update($request->all());

    }
}
