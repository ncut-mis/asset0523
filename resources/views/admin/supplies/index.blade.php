@extends('admin.layouts.master')

@section('title', '耗材管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            耗材管理 <small>耗材列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 耗材管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="input-group custom-search-form">
    <form action="{{ route('admin.supplies.show') }}" method="POST">
        {{ csrf_field() }}
        <span class="input-group-btn">
    <input name="Search" class="form-control" placeholder="Search...">
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
        </span>
    </form>
</div>

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('admin.supplies.create') }}" class="btn btn-success">建立新購耗材</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="100" style="text-align: center">耗材編號</th>
                        <th style="text-align: center">耗材名稱</th>
                        <th width="100" style="text-align: center">耗材數量</th>
                        <th width="300" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($supplies as $supplies)
                    <tr>
                        <td style="text-align: center">{{ $supplies->id }}</td>
                        <td style="text-align: center">{{ $supplies->name }}</td>
                        <td style="text-align: center">{{ $supplies->quantity }}</td>
                        <td>
                            <table >
                                <tbody>
                                <tr class="table-text" style="text-align: center">
                                    <td width="100" >
                                        <a class="btn btn-primary" role="button" href="{{ route('admin.supplies.edit', $supplies->id) }}" >修改</a>
                                    </td>
                                    <td width="100">
                                        <a class="btn btn-primary" role="button" href="{{ route('admin.receive.create', $supplies->id) }}" >領取</a>
                                    </td>
                                    <!-- 刪除按鈕 -->
                                    <td width="100">
                                        <form action="{{ route('admin.supplies.destroy', $supplies->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">刪除</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
