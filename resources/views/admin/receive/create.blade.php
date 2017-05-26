@extends('admin.layouts.master')

@section('title', '領取耗材')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            領取耗材 <small>輸入耗材領取數量</small>
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
        <form action="/admin/supplies/{{$supplies->id}}/receive" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>領取員工：</label>
                <input name="user_id" class="form-control" placeholder="請輸入員工">
            </div>
            <div class="form-group">
                <label>耗材編號：</label>
                <input name="supply_id" class="form-control" value="{{$supplies->id}}" readonly>
            </div>
            <div class="form-group">
                <label>耗材名稱：</label>
                <input  class="form-control" value="{{$supplies->name}}" readonly>
            </div>
            <div class="form-group">
                <label>日期時間：</label>
                <input name="datatime" class="form-control" placeholder="請輸入日期與時間" value="{{$today->year}}{{$today->month}}{{$today->day}}" readonly>
            </div>

            <div class="form-group">
                <label>領取數量：</label>
                <input name="quantity" class="form-control" placeholder="請輸入領取數量">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">領取耗材</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
