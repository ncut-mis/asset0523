@extends('admin.layouts.master')

@section('title', '報修管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            報修管理 <small>所有報修列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>報修管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="input-group custom-search-form">
<form action="{{ route('admin.maintainces.Search') }}" method="POST">
    {{ csrf_field() }}
    <span class="input-group-btn">
    <input name="Search" class="form-control" placeholder="Search...">
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
    </span>
</form>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">id</th>
                        <th >資產名稱</th>
                        <th width="80" style="text-align: center">報修狀態</th>
                        <th width="80" style="text-align: center">維修方式</th>
                        <th width="80" style="text-align: center">申請日期</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($maintainces as $maintaince)
                    <tr>
                        <td style="text-align: center">
                            {{ $maintaince->id }}
                        </td>
                        @foreach($assets as $asset)
                        <td style="text-align: center">
                            {{ $asset->name }}
                        </td>
                        @endforeach
                        <td style="text-align: center">{{ $maintaince->status }}</td>
                        <td style="text-align: center">{{ $maintaince->method }}</td>
                        @foreach($applications as $application)
                        <td style="text-align: center">{{ $applications->date}}</td>
                        @endforeach
                        <td style="text-align: center">{{ $asset->location }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.maintainces.edit', $asset->id) }}">處理</a>
                            </div>
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
