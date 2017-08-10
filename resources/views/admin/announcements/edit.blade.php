@extends('admin.layouts.master')

@section('title', '修改公告')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改公告 <small>編輯公告</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 公告管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/anonouncements/{{$anonouncements->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>日期：</label>
                <label name="date" class="form-control" value="{{$anonouncements->date}}"> </label>
            </div>
            <div class="form-group">
                <label>標題：</label>
                <input name="title" class="form-control" placeholder="請輸入標題" value="{{$anonouncements->title}}">
            </div>

            <div class="form-group">
                <label>內容：</label>
                <input name="content" class="form-control" placeholder="請輸入內容" value="{{$anonouncements->content}}">
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
