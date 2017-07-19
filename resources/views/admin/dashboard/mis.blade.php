@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            主控台 <small></small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 公告
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 目前報修
            </li>
        </ol>
        @if(count($applications) > 0)
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
                    @foreach($applications as $application)
                        <tbody>
                        @foreach($maintainces as $maintaince)
                            @if($maintaince->id==$application->maintaince_id)
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
                                        @if($maintaince->id==$application->maintaince_id)
                                            {{ $application-> date}}
                                        @endif
                                    </td>

                                    <td class="table-text" style="text-align: center">
                                        <a href="{{ route('admin.maintainces.show', $maintaince->id) }}" class="btn btn-primary" role="button">處理</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 報修處理
            </li>
        </ol>
        @if(count($maintaincesA) > 0)
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
                                @foreach($applicationsA as $application)
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
        @endif
    </div>
</div>
<!-- /.row -->

<div class="row">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
<!-- /.row -->

@endsection
