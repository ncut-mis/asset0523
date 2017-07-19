<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AnnouncementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $anonouncements = Announcement::orderBy('created_at', 'DESC')->get();
        $data = ['anonouncements' => $anonouncements];
        return view('admin.anonouncements.index', $data);
    }

    public function create()
    {
        return view('admin.anonouncements.create');
    }

    public function edit($id)
    {
        $anonouncements = Announcement::find($id);
        $data = ['anonouncements' => $anonouncements];

        return view('admin.anonouncements.edit', $data);
    }

    public function update(Requests $request, $id)
    {
        $anonouncements = Announcement::find($id);
        $anonouncements->update($request->all());

        return redirect()->route('admin.anonouncements.index');
    }

    public function store(Requests  $request)
    {
        Announcement::create($request->all());
        return redirect()->route('admin.anonouncements.index');
    }

    public function destroy($id)
    {
        Announcement::destroy($id);
        return redirect()->route('admin.anonouncements.index');
    }
    public function show(Request $request)
    {
        $Search =$request->input('Search');
        $supplies = Announcement::orderBy('created_at', 'DESC')
            ->when($Search, function ($query) use ($Search) {
                return $query->where('name', 'like','%'.$Search.'%');
            })->get();
        $data=['supplies'=>$supplies];
        return view('admin.anonouncements.index' ,$data);
    }
}
