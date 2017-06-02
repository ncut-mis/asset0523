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
        //
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
/*
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
*/
    public function show(Request $request,$id){
        //$array = ["未選擇","廠商維修","自行維修","不修"];

        $maintaince=Maintaince::find($id);
        $asset=Asset::find($maintaince->asset_id);

        $maintaince->update([
            'status'=>'申請待處理'
        ]);

        $data=['maintaince'=>$maintaince,'asset'=>$asset];
        return view('admin.maintainces.show', $data);
    }

    public function process(Request $request,$id){
        $maintaince=Maintaince::find($id);
        $maintaince->update([
            'method'=>$request->method
        ]);
        return redirect()->route('admin.maintainces.index');
    }

    public function detail(Request $request,$id){

        return view(admin.maintainces.detail);
    }

    public function detail_store(Request $request,$id){

        return redirect()->route('admin.assets.index');
    }

    public function method(Request $request){
        return view();
    }

    public function vendor(Request $request){
        return view();
    }





}
