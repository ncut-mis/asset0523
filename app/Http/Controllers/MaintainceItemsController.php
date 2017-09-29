<?php

namespace App\Http\Controllers;

use App\Maintaince;
use App\MaintainceItem;
use Illuminate\Http\Request;

use App\Http\Requests;

class MaintainceItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index($id){
        $maintaince=Maintaince::find($id);
        $data=['maintaince'=>$maintaince,'maintainceitems'=>$maintaince->maintainceitems];
        return view('admin.maintainces.details',$data);
    }

    public function store(Requests\MaintainceItemRequest $request,$id){
        $maintaince=Maintaince::find($id);
        $maintaince->maintainceitems()->create([
            'name'=>$request->name,
            'amount'=>$request->amount
        ]);
        $data=['maintaince'=>$maintaince];
        return redirect()->route('admin.maintainces.details',$data);
    }

    public function edit($mid,$id)
    {
        $maintaince=Maintaince::find($mid);
        $maintainceitem=MaintainceItem::find($id);
        $data = ['maintaince' => $maintaince,'maintainceitem'=>$maintainceitem];

        return view('admin.maintainces.edit', $data);
    }
    public function update(Requests\MaintainceItemRequest $request,$mid, $id)
    {
        $maintainceitem=MaintainceItem::find($id);
        $maintainceitem->update($request->all());
        $maintaince=Maintaince::find($mid);
        $data=['maintaince'=>$maintaince];
        return redirect()->route('admin.maintainces.details',$data);
    }
    public function destroy($mid,$id)
    {
        MaintainceItem::destroy($id);
        $maintaince=Maintaince::find($mid);
        $data=['maintaince'=>$maintaince];
        return redirect()->route('admin.maintainces.details',$data);
    }
}
