@extends('admin.layouts.master')

@section('title', '資產報修申請')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            資產報修申請 <small>請輸入資產問題</small>
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
        <form action="/admin/assets/{{$asset->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div>
            <div class="form-group">
                <label>資產名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入資產名稱" value="{{$asset->name}}">
            </div>

            <div class="form-group">
                <label>資產類別：</label>
                <input name="category" class="form-control" placeholder="請輸入資產名稱" value="{{$asset->category}}">
            </div>

            <div class="form-group">
                <label>資產狀態：</label>
                <input name="status" class="form-control" placeholder="請輸入資產狀態" value="{{$asset->status}}">
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <input name="keeper" class="form-control" placeholder="請輸入資產保管人" value="{{$asset->keeper}}">
            </div>

            <div class="form-group">
                <label>放置地點：</label>
                <input name="location" class="form-control" placeholder="請輸入資產放置地點" value="{{$asset->location}}">
            </div>
            </div>

            <div class="text-right">
                <label>問題描述：</label>
                <input name="problem"  placeholder="請輸入資產問題">
                <button type="submit" class="btn btn-success">申請</button>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
