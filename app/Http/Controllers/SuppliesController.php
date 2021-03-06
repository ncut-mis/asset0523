<?php

namespace App\Http\Controllers;
use App\Receive;
use App\Supply;
use Illuminate\Http\Request;
use App\Http\Requests;
class SuppliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function update(Requests\SupplyRequest $request, $id)
    {
        $supplies = Supply::find($id);
        $supplies->update($request->all());

        return redirect()->route('admin.supplies.index');
    }

    public function store(Requests\SupplyRequest $request)
    {
        $supply = Supply::where('name',$request->name)->first();
        if(count($supply) == 0)
        Supply::create($request->all());
        else{
            $supply->update([
                'quantity'=>$supply->quantity + $request->quantity
            ]);
        }
        return redirect()->route('admin.supplies.index');
    }

    public function destroy($id)
    {
        Supply::destroy($id);
        return redirect()->route('admin.supplies.index');
    }
    public function show(Requests\SupplyRequest $request)
    {
        $Search =$request->input('Search');
        $supplies = Supply::orderBy('created_at', 'DESC')
            ->when($Search, function ($query) use ($Search) {
                return $query->where('name', 'like','%'.$Search.'%');
            })->get();
        $data=['supplies'=>$supplies];
        return view('admin.supplies.index' ,$data);
    }

    public function data($id)
    {
        $supply = Supply::find($id);
        $data = ['supply' => $supply];
        return view('admin.supplies.show', $data);
    }


    public function buy($id)
    {
        $supplies= Supply::find($id);
        $data = ['supplies' => $supplies];
        return view('admin.supplies.buy',$data);
    }
    public function buyupdate(Requests\SupplyBuyRequest $request, $id)
    {
        $supplies=Supply::find($id);
        $supplies->update([
            'quantity'=>$supplies->quantity + $request->quantity
        ]);
        return redirect()->route('admin.supplies.index');
    }


}