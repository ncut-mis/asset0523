@extends('admin.layouts.master')

@section('title', '耗材資料')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            耗材 <small>耗材資料</small>
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
            <div class="form-group">
                <label width="80">耗材名稱：</label>
                <label name="name">{{$supply->name}}</label>
            </div>

        <div class="form-group">
            <label width="80">數量：</label>
                    <label name="quantity">{{$supply->quantity}}</label>
        </div>
        <div>
            <a href="{{ route('admin.supplies.index') }}" class="btn btn-success">返回</a>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
