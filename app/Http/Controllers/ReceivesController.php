<?php

namespace App\Http\Controllers;

use App\Receive;
use App\User;
use Illuminate\Http\Request;
use App\Supply;
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
        $supply= Supply::find($id);
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $today = Carbon::today();
        $data = ['supply' => $supply,'users'=>$users,'today'=>$today];
        return view('admin.supplies.receive',$data);
    }
    public function store(Request $request, $id)
    {

        $supply=Supply::find($id);
        /* $quantity=$supply->quantity-$request->quantity;
        $supply->update([
            'quantity'=>$quantity
        ]);*/
       Receive::create([
            'user_id'=>$request->user_id,
            'supply_id'=>$request->supply_id,
            'date'=>$now = Carbon::now(),
            'quantity'=>$request->quantity
        ]);
        return redirect()->route('admin.supplies.index');
    }
}
