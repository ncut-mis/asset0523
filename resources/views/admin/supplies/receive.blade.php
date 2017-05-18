@extends('admin.layouts.master')

@section('title', '新購耗材')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增耗材 <small>輸入耗材資料</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 耗材管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/supplies" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label>耗材名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入名稱">
            </div>

            <div class="form-group">
                <label>耗材數量：</label>
                <input name="quantity" class="form-control" placeholder="請輸入耗材數量">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
