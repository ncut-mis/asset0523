@extends('admin.layouts.master')

@section('title', '使用者資料')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            使用者 <small>使用者資料</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 使用者管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
            <div class="form-group">
                <label width="80">使用者名稱：</label>
                <lable name="name">{{$user->name}}</lable>
            </div>

            <div class="form-group">
                <label width="80">E-mail：</label>
                        <lable name="email">{{$user->email}}</lable>
            </div>

            <div class="form-group">
                <label width="80">部門：</label>
                <lable name="department_id">{{$user->department_id}}</lable>
            </div>

            <div class="form-group">
                <label width="80">分機號碼：</label>
                <lable name="extension">{{$user->extension}}</lable>
            </div>

            <div class="form-group">
                <label width="80">職位：</label>
                <lable name="position">{{$user->position}}</lable>
            </div>

            <div class="form-group">
                <label width="80">連絡電話：</label>
                <lable name="phone">{{$user->phone}}</lable>
            </div>

            <div class="form-group">
                <label width="80">權限：</label>
                    <lable name="previlege_id">{{$user->previlege_id}}</lable>
            </div>

        <div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-success">返回</a>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
