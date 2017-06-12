@extends('admin.layouts.master')

@section('title', '修改資產')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改資產 <small>編輯資產資料</small>
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
        <form action="/admin/assets/{{$asset->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label>資產名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入資產名稱" value="{{$asset->name}}">
            </div>

            <div class="form-group">
                <label>資產類別：</label>
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                        @if($asset->category==$category->id)
                            <option value={{ $category->id }} selected="true">{{ $category->name }}</option>
                        @else
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>購置日期：</label>
                <input name="date" class="form-control" placeholder="請輸入資產購置日期" value="{{$asset->date}}">
            </div>

            <div class="form-group">
                <label>成本：</label>
                <input name="cost" class="form-control" placeholder="請輸入資產成本" value="{{$asset->cost}}">
            </div>

            <div class="form-group">
                <label>資產狀態：</label>
                <select name="status" class="form-control">
                    @if($asset->status=='維修中')
                        <option value="正常使用中">正常使用中</option>
                        <option value="維修中" selected="true">維修中</option>
                        <option value="租借中">租借中</option>
                        <option value="待報廢">待報廢</option>
                        <option value="已報廢">已報廢</option>
                    @elseif($asset->status=='租借中')
                        <option value="正常使用中">正常使用中</option>
                        <option value="維修中">維修中</option>
                        <option value="租借中" selected="true">租借中</option>
                        <option value="待報廢">待報廢</option>
                        <option value="已報廢">已報廢</option>
                    @elseif($asset->status=='待報廢')
                        <option value="正常使用中">正常使用中</option>
                        <option value="維修中">維修中</option>
                        <option value="租借中">租借中</option>
                        <option value="待報廢" selected="true">待報廢</option>
                        <option value="已報廢">已報廢</option>
                    @elseif($asset->status=='已報廢')
                        <option value="正常使用中">正常使用中</option>
                        <option value="維修中">維修中</option>
                        <option value="租借中">租借中</option>
                        <option value="待報廢">待報廢</option>
                        <option value="已報廢" selected="true">已報廢</option>
                    @else
                        <option value="正常使用中" selected="true">正常使用中</option>
                        <option value="維修中">維修中</option>
                        <option value="租借中">租借中</option>
                        <option value="待報廢">待報廢</option>
                        <option value="已報廢">已報廢</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <select name="keeper" class="form-control">
                    @foreach($users as $user)
                        @if($asset->keeper==$user->id)
                            <option value={{ $user->id }} selected="true">{{ $user->name }}</option>
                        @else
                            <option value={{ $user->id }}>{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>可否租借？</label>
                <select name="lendable" class="form-control">
                    <option value="0" {{ $asset->lendable?'':'SELECTED' }}>否</option>
                    <option value="1" {{ $asset->lendable?'SELECTED':'' }}>是</option>
                </select>
            </div>

            <div class="form-group">
                <label>放置地點：</label>
                <input name="location" class="form-control" placeholder="請輸入資產放置地點" value="{{$asset->location}}">
            </div>

            <div class="form-group">
                <label>供應商：</label>
                <select name="vendor" class="form-control">
                    @foreach($vendors as $vendor)
                        @if($asset->vendor==$vendor->id)
                            <option value={{ $vendor->id }} selected="true">{{ $vendor->name }}</option>
                        @else
                            <option value={{ $vendor->id }}>{{ $vendor->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>耐用年限：</label>
                <input name="warranty" class="form-control" placeholder="請輸入資產耐用年限" value="{{$asset->warranty}}">
            </div>

            <div class="form-group">
                <label>備註：</label>
                <textarea name="submit" class="form-control" rows="5" value="{{$asset->remark}}"></textarea>
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
