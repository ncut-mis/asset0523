<?php

namespace App\Http\Controllers;


use App\Asset;
use App\Category;
use App\Http\Requests\AssetRequest;
use App\Lending;
use App\Maintaince;
use App\MaintainceItem;
use App\User;
use App\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $lendings=Lending::whereNull('returntime')->get();
        if(!(Auth::user()->previlege_id==3)){
            $asset=Asset::where('id','0')->get();
        }

        $data=['assets'=>$asset,'lendings'=>$lendings,'categories'=>$category];
        return view('admin.assets.index', $data);
    }
    public function create()
    {
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $vendors=Vendor::orderBy('created_at' ,'DESC') ->get();
        $data=['categories'=>$category,'users'=>$users,'vendors'=>$vendors];
        return view('admin.assets.create' ,$data);
    }

    public function edit($id)
    {
        //$array = ["正常使用中","維修中","租借中","待報廢","已報廢"];
        $categories=Category::orderBy('created_at' ,'DESC') ->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $vendors=Vendor::orderBy('created_at' ,'DESC') ->get();
        $asset=Asset::find($id);
        $data = ['asset' => $asset,'categories'=>$categories,'users'=>$users,'vendors'=>$vendors];

        return view('admin.assets.edit', $data);
    }
    public function update(AssetRequest $request, $id)
    {
        $asset=Asset::find($id);
        $asset->update($request->all());

        return redirect()->route('admin.assets.index');
    }
    public function store(AssetRequest $request)
    {
        Asset::create($request->all());
        return redirect()->route('admin.assets.index');
    }
    public function destroy($id)
    {
        Asset::destroy($id);
        return redirect()->route('admin.assets.index');
    }

    public function data($id)
    {
        $asset=Asset::find($id);
        $category=Category::find($asset->category);
        $vendor=Vendor::find($asset->vendor);
        $user=User::find($asset->keeper);
        $maintainceitems=MaintainceItem::orderBy('created_at', 'ASC')->get();
        $assetmaintainces=Maintaince::where('asset_id',$asset->id)->where('status','已完成維修')->get();

        $data = ['asset' => $asset,'category'=>$category,'vendor'=>$vendor,'user'=>$user,
                 'assetmaintainces'=>$assetmaintainces,'maintainceitems'=>$maintainceitems];

        return view('admin.assets.show', $data);
    }

    public function Search(Request $request)
    {
        $Search =$request->input('Search');
        $asset = Asset::orderBy('created_at', 'DESC')
            ->where('name', 'like','%'.$Search.'%')
            ->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $lendings=Lending::whereNull('returntime')->get();
        $data=['assets'=>$asset,'lendings'=>$lendings,'categories'=>$category];
        return view('admin.assets.index' ,$data);
    }

    public function SearchAll(Request $request)
    {
        $asset = Asset::orderBy('created_at', 'DESC');

        $Search =$request->input('Search');
        $asset ->where('name', 'like','%'.$Search.'%')
            ->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['assets'=>$asset,'categories'=>$category];
        return view('admin.assets.index' ,$data);
    }
    public function scrapped($id)
    {
        $asset=Asset::find($id);
        $asset->update([
            'status'=>'已報廢'
        ]);
        return redirect()->route('admin.assets.index');
    }

    public function lendings_create($id)
    {
        $asset=Asset::find($id);
        $users=User::orderBy('created_at' ,'DESC') ->get();
        $today = Carbon::today();
        $data=['asset'=>$asset,'users'=>$users,'today'=>$today];
        return view('admin.assets.lending' ,$data);
    }

    public function lendings_store(Request $request,$id)
    {
        $asset=Asset::find($id);
        $asset->lendings()->create([
            'user_id'=>$request->user_id,
            'lenttime'=> Carbon::now(),
        ]);
        $asset->update([
            'status'=>'租借中'
        ]);
        return redirect()->route('admin.assets.index');
    }

    public function lendings_return($aid,$id)
    {
        $asset=Asset::find($aid);
        $lending=Lending::find($id);
        $lending->update([
            'returntime'=>Carbon::now()
        ]);
        $asset->update([
            'status'=>'正常使用中'
        ]);
        return redirect()->route('admin.assets.index');
    }
}
