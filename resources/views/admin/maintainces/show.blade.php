@extends('admin.layouts.master')

@section('title', '維修處理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            維修處理 <small>選擇維修方式</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 維修處理
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
            <label width="80">資產名稱：</label>
            <input name="name" class="col-lg-4,form-control" placeholder="請輸入資產名稱" value="{{$asset->name}}" readonly>
        </div>

        <div class="form-group">
            <label width="80">保管人：</label>
            <input name="keeper" class="col-lg-4,form-control" placeholder="請輸入資產保管人" value="{{$asset->keeper}}" readonly>
        </div>

        <div class="form-group">
            <label width="80">放置地點：</label>
            <input name="location" class="col-lg-4,form-control" placeholder="請輸入資產放置地點" value="{{$asset->location}}" readonly>
        </div>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 申請資訊
            </li>
        </ol>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="100" style="text-align: center">申請人</th>
                    <th width="100" style="text-align: center">問題描述</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td style="text-align: center">
                            @foreach($users as $user)
                                @if($application->user_id==$user->id)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>

                        <td style="text-align: center">{{ $application->problem }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



        @if(count($assetmaintainces)>0)
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 過去維修紀錄
                </li>
            </ol>
            <div class="panel-group" id="accordion" role="tablist">
                <div class="panel panel-default">
                    @foreach($assetmaintainces as $assetmaintaince)
                        <div class="panel-heading" role="tab" id="heading{{$assetmaintaince->id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$assetmaintaince->id}}" aria-expanded="false>"
                                   aria-controls="collapse{{$assetmaintaince->id}}">
                                       維修編號 - {{$assetmaintaince->id}}
                                </a>
                            </h4>
                        </div>

                        <div id="collapse{{$assetmaintaince->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$assetmaintaince->id}}">

                            <div class="panel-body">
                                <table class="table table-striped task-table">
                                    <!-- 表頭 -->
                                    <thead>
                                    <th width="100" style="text-align: center">維修項目</th>
                                    <th width="100" style="text-align: center">金額</th>
                                    </thead>
                                @foreach($maintainceitems as $maintainceitem)
                                    @if($assetmaintaince->id==$maintainceitem->maintaince_id)
                                    <!-- 表身 -->
                                    <tbody>
                                    <tr>
                                        <!-- 任務名稱 -->
                                        <td class="table-text" style="text-align: center">
                                            <div>{{ $maintainceitem->name }}</div>
                                        </td>
                                        <td class="table-text" style="text-align: center">
                                            <div>{{ $maintainceitem->amount }}</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endforeach
                </div>
                </div>
        @endif

                <form action="/admin/maintainces/{{$maintaince->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label>選擇報修處理方式</label>
                <select name="method" class="form-control">
                        <option value="未選擇">未選擇</option>
                        <option value="廠商維修">廠商維修</option>
                        <option value="自行維修">自行維修</option>
                        <option value="不修">不修</option>
                </select>
            </div>

                    <div class="form-group">
                        <label>選擇維修廠商：</label>
                        <select name="vendor" class="form-control" >
                            @foreach($vendors as $vendor)
                                @if($asset->vendor==$vendor->id)
                                    <option value={{ $vendor->id }} selected="true">{{ $vendor->name }}</option>
                                @else
                                    <option value={{ $vendor->id }}>{{ $vendor->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

        <div class="text-right">
            <button type="submit" class="btn btn-success">確定</button>
        </div>
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        </div>
    </div>
</div>
<!-- /.row -->
@endsection
