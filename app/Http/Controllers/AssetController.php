<?php

namespace App\Http\Controllers;


use App\Asset;
use App\Category;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    //
    public function index()
    {
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $data=['assets'=>$asset];
        return view('admin.assets.index', $data);
    }

    public function create()
    {
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['categories'=>$category];
        return view('admin.assets.create' ,$data);
    }

    public function edit($id)
    {
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $asset=Asset::find($id);
        $data = ['asset' => $asset,'categories'=>$category];

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

    public function select($query){
        $asset=Asset::scopeOfName($query)->get();
        $data=['assets'=>$asset];
        return view('admin.assets.index' ,$data);
    }

}
