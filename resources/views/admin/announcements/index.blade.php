@extends('admin.layouts.master')

@section('title', '公告管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            公告管理 <small>公告列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 公告管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="input-group custom-search-form">
    <form action="{{ route('admin.anonouncements.show') }}" method="POST">
        {{ csrf_field() }}
        <span class="input-group-btn">
    <input name="Search" class="form-control" placeholder="Search...">
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
        </span>
    </form>
</div>

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('admin.anonouncements.create') }}" class="btn btn-success">新增公告</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="100" style="text-align: center">標題</th>
                        <th style="text-align: center">內容</th>
                        <th width="100" style="text-align: center">日期</th>
                        <th width="300" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($anonouncements as $anonouncements)
                    <tr>
                        <td style="text-align: center">{{ $anonouncements->title}}</td>
                        <td style="text-align: center">{{ $anonouncements->content }}</td>
                        <td style="text-align: center">{{ $anonouncements->date}}</td>
                        <td>
                            <div>
                            <table >
                                <tbody>
                                <tr class="table-text" style="text-align: center">
                                    <td width="100" >
                                        <a class="btn btn-primary" role="button" href="{{ route('admin.supplies.edit', $supplies->id) }}" >修改</a>
                                    </td>
                                    <!-- 刪除按鈕 -->
                                    <td width="100">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                            刪除
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        確定刪除？
                                                    </div>
                                                    <div class="modal-footer">
                                                        <table style="text-align: right">
                                                            <tbody style="text-align: right">
                                                            <tr class="table-text" style="text-align: center">
                                                                <td width="100" >
                                                                    <form action="{{ route('admin.supplies.destroy', $supplies->id) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <button class="btn btn-danger">刪除</button>
                                                                    </form>
                                                                </td>
                                                                <td width="100">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
