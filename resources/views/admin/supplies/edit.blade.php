@extends('admin.layouts.master')

@section('title', '修改耗材')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改耗材 <small>編輯耗材資料</small>
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
        <form action="/admin/supplies/{{$supplies->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label>耗材名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入耗材名稱" value="{{$supplies->name}}">
            </div>

            <div class="form-group">
                <label>耗材數量：</label>
                <input name="quantity" class="form-control" placeholder="請輸入耗材數量">{{$supplies->quantity}}
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
