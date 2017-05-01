@extends('admin.layouts.master')

@section('title', '新增資產')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增資產<small>請輸入資產資產</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>資產管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/assets" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label>資產名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入資產名稱">
            </div>

            <div class="form-group">
                <label>資產類別：</label>
                <input name="category" class="form-control" placeholder="請輸入資產類別">
            </div>

            <div class="form-group">
                <label>購置日期：</label>
                <input name="date" class="form-control" placeholder="請輸入資產購置日期">
            </div>

            <div class="form-group">
                <label>成本：</label>
                <input name="cost" class="form-control" placeholder="請輸入資產成本">
            </div>

            <div class="form-group">
                <label>資產狀態：</label>
                <input name="status" class="form-control" placeholder="請輸入資產狀態">
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <input name="keeper" class="form-control" placeholder="請輸入資產保管人">
            </div>

            <div class="form-group">
                <label>可否租借？</label>
                <select name="lendable" class="form-control">
                    <option value="0">否</option>
                    <option value="1">可</option>
                </select>
            </div>

            <div class="form-group">
                <label>放置地點：</label>
                <input name="location" class="form-control" placeholder="請輸入資產放置地點">
            </div>

            <div class="form-group">
                <label>備註：</label>
                <textarea name="remark" class="form-control" rows="10"></textarea>
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
