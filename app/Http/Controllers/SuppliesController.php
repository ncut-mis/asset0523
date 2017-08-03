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
        $supply = Supply::where('name',$request->name)->get();
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
    public function buy($id)
    {
        $supplies= Supply::find($id);
        $data = ['supplies' => $supplies];
        return view('admin.supplies.buy',$data);
    }
    public function buyupdate(Request $request, $id)
    {
        $supplies=Supply::find($id);
        $supplies->update([
            'quantity'=>$supplies->quantity+$request->quantity
        ]);
        return redirect()->route('admin.supplies.index');
    }

   /* public function autocomplete(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('users')
            ->where('first_name', 'LIKE', '%'.$term.'%')
            ->orWhere('last_name', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->first_name.' '.$query->last_name ];
        }
        return Response::json($results);
    }
   */
}