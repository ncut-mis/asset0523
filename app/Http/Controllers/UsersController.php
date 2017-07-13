<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        $users=User::orderBy('created_at', 'DESC')->get();
        $data=['users'=>$users];
        return view('admin.users.index', $data);
    }
    public function create()
    {
        return view('admin.users.create');
    }

    public function edit($id)
    {
        $user=User::find($id);
        $data = ['user'=>$user];
        return view('admin.users.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('admin.users.index');
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }

    public function data($id)
    {
        $user=User::find($id);
        $data = ['user'=>$user];
        return view('admin.users.show', $data);
    }

    public function Search(Request $request)
    {
        $Search =$request->input('Search');
        $user = User::orderBy('created_at', 'DESC')
            ->where('name', 'like','%'.$Search.'%')
            ->get();
        $data=['user'=>user];
        return view('admin.users.index' ,$data);
    }
}
