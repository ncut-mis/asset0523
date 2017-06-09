@extends('admin.layouts.master')

@section('title', '維修處理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            維修處理 <small>所有維修列表</small>
        </h1>
    </div>
</div>


@if(count($maintaincesA) > 0)
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>維修處理-未處理
            </li>
        </ol>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="80" style="text-align: center">維修編號</th>
                        <th style="text-align: center">資產名稱</th>
                        <th width="100" style="text-align: center">維修狀態</th>
                        <th width="80" style="text-align: center">維修方式</th>
                        <th width="120" style="text-align: center">申請日期</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($maintaincesA as $maintaince)
                    <tr>
                        <td style="text-align: center">
                            {{ $maintaince->id }}
                        </td>

                        <td style="text-align: center">
                        @foreach($assets as $asset)
                            @if($maintaince->asset_id==$asset->id)
                            {{ $asset->name }}
                            @endif
                        @endforeach
                        </td>

                        <td style="text-align: center">{{ $maintaince->status }}</td>

                        <td style="text-align: center">{{ $maintaince->method }}</td>

                        <td style="text-align: center">
                            @foreach($applications as $application)
                                @if($maintaince->id==$application->maintaince_id)
                                    {{ $application-> date}}
                                @endif
                            @endforeach
                        </td>

                        <td class="table-text" style="text-align: center">
                                <a href="{{ route('admin.maintainces.show', $maintaince->id) }}" class="btn btn-primary" role="button">處理</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(count($maintainces) > 0)
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>維修處理-處理中
            </li>
        </ol>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="80" style="text-align: center">維修編號</th>
                    <th style="text-align: center">資產名稱</th>
                    <th width="100" style="text-align: center">維修狀態</th>
                    <th width="80" style="text-align: center">維修方式</th>
                    <th width="120" style="text-align: center">申請日期</th>
                    <th width="100" style="text-align: center">功能</th>
                </tr>
                </thead>
                <tbody>
                @foreach($maintainces as $maintaince)
                    @if($maintaince->status!=='申請中'&&$maintaince->status!=='已完成維修')
                    <tr>
                        <td style="text-align: center">
                            {{ $maintaince->id }}
                        </td>
                        <td style="text-align: center">
                            @foreach($assets as $asset)
                                @if($maintaince->asset_id==$asset->id)
                                    {{ $asset->name }}
                                @endif
                            @endforeach
                        </td>
                        <td style="text-align: center">{{ $maintaince->status }}</td>
                        <td style="text-align: center">{{ $maintaince->method }}</td>
                        <td style="text-align: center">
                            @foreach($applications as $application)
                                @if($maintaince->id==$application->maintaince_id)
                                    {{ $application-> date}}
                                @endif
                            @endforeach
                        </td>
                        <td class="table-text" style="text-align: center">
                                @if($maintaince->method!=='未選擇')
                                    <a href="{{ route('admin.maintainces.details', $maintaince->id) }}" class="btn btn-primary" role="button">處理</a>
                                @else
                                    <a href="{{ route('admin.maintainces.show', $maintaince->id) }}" class="btn btn-primary" role="button">處理</a>
                                @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
<!-- /.row -->
@endsection
