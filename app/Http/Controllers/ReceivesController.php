<?php

namespace App\Http\Controllers;

use App\Receive;
use Illuminate\Http\Request;
use App\Supply;
use App\Http\Requests;
use Carbon\Carbon;

class ReceivesController extends Controller
{
    public function create($id)
    {
        $supplies = Supply::find($id);
        $data = ['supplies' => $supplies];
        $today = Carbon::today();
        $today =['today'=>$today];
        return view('admin.receive.create',$data,$today);
    }
    public function store(Request $request,$id)
    {
        Receive::create($request->all());
        return redirect()->route('admin.supplies.index');
    }
}
