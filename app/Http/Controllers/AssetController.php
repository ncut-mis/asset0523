<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AssetController extends Controller
{
    //
    public function index()
    {
        $asset=Asset::orderBy('created_at', 'DESC')->get();
        $data=['asset'=>$asset];
        return view('admin.assets.index', $data);
    }

    public function create()
    {
        return view('admin.assets.create');
    }

    public function edit($id)
    {
        $asset=Asset::find($id);
        $data = ['asset' => $asset];

        return view('admin.assets.edit', $data);
    }
    public function update(PostRequest $request, $id)
    {
        $asset=Asset::find($id);
        $asset->update($request->all());

        return redirect()->route('admin.assets.index');
    }
    public function store(PostRequest $request)
    {
        Asset::create($request->all());
        return redirect()->route('admin.assets.index');
    }
    public function destroy($id)
    {
        Asset::destroy($id);

        return redirect()->route('admin.assets.index');
    }

}
