<?php

namespace App\Http\Controllers;


use App\Asset;
use App\Category;
use App\User;
use App\Vendor;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    //
    public function index()
    {
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['assets'=>$asset
            ,'categories'=>$category
        ];
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
    public function update(Request $request, $id)
    {
        $asset=Asset::find($id);
        $asset->update($request->all());

        return redirect()->route('admin.assets.index');
    }
    public function store(Request $request)
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
        $data = ['asset' => $asset,'category'=>$category,'vendor'=>$vendor,'user'=>$user];

        return view('admin.assets.show', $data);
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
