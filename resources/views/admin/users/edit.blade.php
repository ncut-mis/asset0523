@extends('admin.layouts.master')

@section('title', '修改資產')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改資產 <small>編輯資產資料</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 資產管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/users/{{$user->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label width="80">使用者名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入使用者名稱" value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label width="80">E-mail：</label>
                <input name="email" class="form-control" placeholder="請輸入E-mail" value="{{$user->email}}">
            </div>

            <div class="form-group">
                <label width="80">密碼：</label>
                <input name="password" class="form-control" placeholder="請輸入密碼" value="{{$user->password}}">
            </div>

            <div class="form-group">
                <label width="80">確認密碼：</label>
                <input name="password_confirm" class="form-control" placeholder="請再次輸出密碼" value="{{$user->password}}">
            </div>

            <div class="form-group">
                <label width="80">部門：</label>
                <input name="department_id" class="form-control" placeholder="請輸入部門" value="{{$user->department_id}}">
            </div>

            <div class="form-group">
                <label width="80">分機號碼：</label>
                <input name="extension" class="form-control" placeholder="請輸入分機號碼" value="{{$user->extension}}">
            </div>

            <div class="form-group">
                <label width="80">職位：</label>
                <input name="position" class="form-control" placeholder="請輸入職位" value="{{$user->position}}">
            </div>

            <div class="form-group">
                <label width="80">連絡電話：</label>
                <input name="phone" class="form-control" placeholder="請輸入連絡電話" value="{{$user->phone}}">
            </div>

            <div class="form-group">
                <label width="80">權限：</label>
                <input name="previlege_id" class="form-control" placeholder="請輸入權限" value="{{$user->previlege_id}}">
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
