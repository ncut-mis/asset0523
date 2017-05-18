<?php

namespace App\Http\Controllers;

use App\Application;
use App\Asset;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApplicationsController extends Controller
{
    //
    public function create($id)
    {
        $category=Category::orderBy('created_at' ,'DESC') ->get();
        $asset=Asset::find($id);
        $data = ['asset' => $asset,'categories'=>$category,'application'=>$asset->applications];
        return view('admin.assets.application', $data);
    }


}
