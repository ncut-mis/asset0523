<?php

namespace App\Http\Controllers;

use App\Application;
use App\Asset;
use App\Maintaince;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;

class MaintaincesController extends Controller
{
    //
    public function create($id)
    {
        $asset=Asset::find($id);
        $data = ['asset' => $asset];
        return view('admin.assets.application', $data);
    }

    public function store(Request $request,$id)
    {
        $asset=Asset::find($id);
        $asset->maintainces()->create([
            'v_id'=>$asset->warranty,
            'status'=>'申請中',
            'method'=>'未選擇',
            'remark'=>null
        ]);
        $asset->update([
            'status'=>'報修中'
        ]);
        $maintainces=Maintaince::orderBy('created_at', 'DESC')->first();
        $maintainces->applications()->create([
            'user_id'=>$request->user()->id,
            'problem'=>$request->problem,
            'date'=>$now = Carbon::now()
        ]);
        return redirect()->route('admin.assets.index');
    }



    public function index()
    {
        $maintainces=Maintaince::orderBy('created_at', 'DESC')->get();
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $applications=Application::orderBy('created_at', 'DESC')->get();
        $data=['maintainces'=>$maintainces,
            'applications'=>$applications,
            'assets'=>$asset
        ];
        return view('admin.maintainces.index', $data);
    }

    public function Search(Request $request)
    {
        $Search =$request->input('Search');
        $asset = Asset::orderBy('created_at', 'DESC')
            ->where('name', 'like','%'.$Search.'%')
            ->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['assets'=>$asset,'categories'=>$category];
        return view('admin.assets.index' ,$data);
    }




}
