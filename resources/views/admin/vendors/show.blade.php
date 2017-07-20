@extends('admin.layouts.master')

@section('title', '廠商資料')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            廠商 <small>廠商資料</small>
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
            <div class="form-group">
                <label width="80">廠商名稱：</label>
                <label name="name">{{$vendors->name}}</label>
            </div>

        <div class="form-group">
            <label width="80">廠商聯絡人：</label>
                    <label name="cantactperson">{{$vendors->cantactperson}}</label>
        </div>

            <div class="form-group">
                <label width="80">廠商電話：</label>
                <label name="phone">{{$vendors->phone}}</label>
            </div>


            <div class="form-group">
                <label width="80">廠商地址：</label>
                <label name="address">{{$vendors->address}}</label>
            </div>

            <div class="form-group">
                <label width="80">銀行名稱：</label>
                <label name="bankname">{{$vendors->bankname}}</label>
            </div>

            <div class="form-group">
                <label width="80">銀行帳戶：</label>
                <label name="bankaccount">{{$vendors->bankaccount}}</label>
            </div>

            <div class="form-group">
                <label width="80">備註：</label>
                <textarea name="submit" class="form-control" rows="5" readonly>{{$vendors->remark}}</textarea>
            </div>

        <div>
            <a href="{{ route('admin.vendors.index') }}" class="btn btn-success">返回</a>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
