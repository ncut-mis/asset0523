<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Application;
use App\Asset;
use App\Maintaince;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Auth::user()->id;
        $applications=Application::where('user_id', Auth::user()->id)->get();
        $applicationsA=Application::orderBy('created_at', 'DESC')->get();
        $maintainces=Maintaince::whereNotIn('status',array('已完成維修','不修'))->get();
        $assets=Asset::orderBy('created_at', 'ASC')->get();
        $maintaincesA=Maintaince::where('status','申請中')->get();
        $announcements = Announcement::orderBy('created_at', 'DESC')->take(3)->get();
        $users=User::orderBy('created_at' ,'DESC') ->get();


        $data=['applications'=>$applications,'maintainces'=>$maintainces,'assets'=>$assets,
            'maintaincesA'=>$maintaincesA,'applicationsA'=>$applicationsA,'announcements'=>$announcements,
            "users"=>$users];
        if (Auth::user()->previlege_id==3)
            return view('admin.dashboard.mis',$data);
        elseif(Auth::user()->previlege_id==4)
            return view('admin.dashboard.index',$data);
        elseif(Auth::user()->previlege_id)
            return view('admin.dashboard.user',$data);

    }
}
