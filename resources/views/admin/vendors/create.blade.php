@extends('admin.layouts.master')

@section('title', '新增廠商')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增廠商 <small>輸入廠商資料</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 廠商管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/vendors" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label>廠商名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入廠商名稱">
            </div>

            <div class="form-group">
                <label>廠商聯絡人：</label>
                <input name="cantactperson" class="form-control" placeholder="請輸入廠商聯絡人">
            </div>

            <div class="form-group">
                <label>廠商電話：</label>
                <input name="phone" class="form-control" placeholder="請輸入廠商電話">
            </div>

            <div class="form-group">
                <label>廠商地址：</label>
                <input name="address" class="form-control" placeholder="請輸入廠商地址">
            </div>
            <div class="form-group">
                <label>銀行名稱：</label>
                <input name="bankname" class="form-control" placeholder="請輸入銀行名稱">
            </div>
            <div class="form-group">
                <label>銀行帳戶：</label>
                <input name="bankaccount" class="form-control" placeholder="請輸入銀行帳戶">
            </div>
            <div class="form-group">
                <label>備註：</label>
                <input name="remark" class="form-control" placeholder="請輸入備註">
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
