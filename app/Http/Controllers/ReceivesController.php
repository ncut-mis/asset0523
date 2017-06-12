<?php

namespace App\Http\Controllers;

use App\Receive;
use Illuminate\Http\Request;
use App\Supply;
use App\Http\Requests;
use Carbon\Carbon;

class ReceivesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create($id)
    {
        $supplies = Supply::find($id);
        $data = ['supplies' => $supplies];
        $today = Carbon::today();
        $today =['today'=>$today];
        return view('admin.receive.create',$data,$today);
    }
    public function receivestore(Request $request,$id)
    {
       /* $supplies =Supply::find($id);
        Supply::create($request->all());
        $receive=Receive::find(supply_id);
        $supplies->quantity;
        $date =['supplies' => $supplies];
*/

        Receive::create($request->all());
        return redirect()->route('admin.supplies.index');
    }
}
