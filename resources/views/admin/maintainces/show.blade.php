@extends('admin.layouts.master')

@section('title', '資產資料')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            資產 <small>資產資料</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 資產管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/maintainces/{{$maintaince->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label width="80">資產名稱：</label>
                <input name="name" class="col-lg-4,form-control" placeholder="請輸入資產名稱" value="{{$asset->name}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">購置日期：</label>
                <input name="date" class="col-lg-4,form-control" placeholder="請輸入資產購置日期" value="{{$asset->date}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">成本：</label>
                <input name="cost" class="col-lg-4,form-control" placeholder="請輸入資產成本" value="{{$asset->cost}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">資產狀態：</label>
                <input name="status" class="col-lg-4,form-control" placeholder="請輸入資產狀態" value="{{$asset->status}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">保管人：</label>
                <input name="keeper" class="col-lg-4,form-control" placeholder="請輸入資產保管人" value="{{$asset->keeper}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">放置地點：</label>
                <input name="location" class="col-lg-4,form-control" placeholder="請輸入資產放置地點" value="{{$asset->location}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">供應商：</label>
                <input name="vendor" class="col-lg-4,form-control" placeholder="請輸入資產供應商" value="{{$asset->vendor}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">耐用年限：</label>
                <input name="warranty" class="col-lg-4,form-control" placeholder="請輸入資產耐用年限" value="{{$asset->warranty}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">備註：</label>
                <textarea name="submit" class="form-control" rows="10" value="{{$asset->remark}}" readonly></textarea>
            </div>

            <div class="form-group">
                <label>選擇報修處理方式</label>
                <select name="method" class="form-control">
                        <option value="未選擇">未選擇</option>
                        <option value="廠商維修">廠商維修</option>
                        <option value="自行維修">自行維修</option>
                        <option value="不修">不修</option>
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
<!-- /.row -->
@endsection
