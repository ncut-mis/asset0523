<?php

namespace App\Http\Controllers;

use App\Application;
use App\Asset;
use App\Category;
use App\Maintaince;
use App\MaintainceItem;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;

class MaintaincesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function create($id)
    {
        $asset=Asset::find($id);
        $category=Category::find($asset->category);
        $user=User::find($asset->keeper);
        $data = ['asset' => $asset,'category'=>$category,'user'=>$user];
        return view('admin.assets.application', $data);
    }

    public function store(Requests\ApplicationRequest $request,$id)
    {
        $asset=Asset::find($id);
        $asset->maintainces()->create([
            'vendor_id'=>$asset->vendor,
            'status'=>'申請中',
            'method'=>'未選擇',
            'remark'=>null
        ]);
        //
        $asset->update([
            'status'=>'維修中'
        ]);
        $maintainces=Maintaince::orderBy('created_at', 'DESC')->first();
        $maintainces->applications()->create([
            'user_id'=>$request->user()->id,
            'problem'=>$request->problem,
            'date'=>Carbon::now()
        ]);
        return redirect()->route('admin.assets.index');
    }

    public function index()
    {
        $maintainces=Maintaince::orderBy('created_at', 'DESC')->whereNotIn('status',['申請中','不修','已完成維修'])->get();
        $maintaincesA=Maintaince::orderBy('created_at', 'DESC')->where('status','申請中')->get();
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $applications=Application::orderBy('created_at', 'DESC')->get();
        $data=['maintainces'=>$maintainces,
            'maintaincesA'=>$maintaincesA,
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
    public function show($id){
        $maintaince=Maintaince::find($id);
        $asset=Asset::find($maintaince->asset_id);
        $vendors=Vendor::orderBy('created_at','DESC')->get();
        $applications=$maintaince->applications()->get();
        $users=User::orderBy('created_at','DESC')->get();

        $maintainceitems=MaintainceItem::orderBy('created_at', 'ASC')->get();
        $assetmaintainces=Maintaince::where('asset_id',$asset->id)->where('status','已完成維修')->get();

        $maintaince->update([
            'status'=>'申請待處理'
        ]);

        $data=['maintaince'=>$maintaince,'asset'=>$asset,'vendors'=>$vendors,'applications'=>$applications,'users'=>$users,
            'assetmaintainces'=>$assetmaintainces,'maintainceitems'=>$maintainceitems];
        return view('admin.maintainces.show', $data);
    }

    public function process(Request $request,$id){
        $maintaince=Maintaince::find($id);
        $maintaince->update([
            'method'=>$request->method
        ]);
        if($request->method=='不修'){
            $asset=Asset::find($maintaince->asset_id);
            $maintaince->update([
                'status'=>'不修',
                'date'=>Carbon::now()
            ]);
            $asset->update([
                'status'=>'待報廢'
            ]);
        }elseif($request->method=='廠商維修'){
            $maintaince->update([
                'status'=>'聯絡廠商中',
            ]);
        }elseif($request->method=='自行維修'){
            $maintaince->update([
                'status'=>'自行維修中',
            ]);
        }

        return redirect()->route('admin.maintainces.index');
    }

    public function complete(Request $request,$id){
        $maintaince=Maintaince::find($id);
        $asset=Asset::find($maintaince->asset_id);
        $maintaince->update([
            'status'=>'已完成維修',
            'date'=>Carbon::now()
        ]);
        $asset->update([
            'status'=>'正常使用中'
        ]);
        return redirect()->route('admin.maintainces.index');
    }






}
