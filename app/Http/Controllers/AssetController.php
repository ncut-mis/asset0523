<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Asset;
use App\Category;

class AssetController extends Controller
{
    //
    public function index()
    {
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $data=['assets'=>$asset];
        return view('assets.index', $data);
    }

    public function create()
    {
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $data=['categories'=>$category];
        return view('assets.create' ,$data);
    }

    public function edit($id)
    {
        $asset=Asset::find($id);
        $data = ['asset' => $asset];

        return view('assets.edit', $data);
    }
    public function update(AssetRequest $request, $id)
    {
        $asset=Asset::find($id);
        $asset->update($request->all());

        return redirect()->route('assets.index');
    }
    public function store(AssetRequest $request)
    {
        Asset::create($request->all());
        return redirect()->route('assets.index');
    }
    public function destroy($id)
    {
        Asset::destroy($id);
        return redirect()->route('assets.index');
    }

}
