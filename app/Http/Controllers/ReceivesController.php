<?php

namespace App\Http\Controllers;

use App\Receive;
use Illuminate\Http\Request;
use App\Supply;
use Carbon\Carbon;

class ReceivesController extends Controller
{
    public function create($id)
    {
        $supplies = Supply::find($id);
        $data = ['supplies' => $supplies];
        $today = Carbon::today();
        return view('admin.receives.create',$data,$today);
    }
    public function store(Request $request,$id)
    {
        Receive::create($request->all());
        return redirect()->route('admin.supplies.index');
    }
}
