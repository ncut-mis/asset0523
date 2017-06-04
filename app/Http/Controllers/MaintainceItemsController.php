<?php

namespace App\Http\Controllers;

use App\Maintaince;
use App\MaintainceItem;
use Illuminate\Http\Request;

use App\Http\Requests;

class MaintainceItemsController extends Controller
{
    //
    public function index($id){
        $maintaince=Maintaince::find($id);
        $data=['maintaince'=>$maintaince,'maintainceitems'=>$maintaince->maintainceitems];
        return view('admin.maintainces.details',$data);
    }

    public function store(Request $request,$id){
        $maintaince=Maintaince::find($id);
        $maintaince->maintainceitems()->create([
            'name'=>$request->name,
            'amount'=>$request->amount
        ]);
        $data=['maintaince'=>$maintaince];
        return redirect()->route('admin.maintainces.details',$data);
    }


}
