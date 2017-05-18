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
                <input name="status" class="form-control" placeholder="請輸入資產狀態" value="{{$asset->status}}">
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <input name="keeper" class="form-control" placeholder="請輸入資產保管人" value="{{$asset->keeper}}">
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
                <input name="vendor" class="form-control" placeholder="請輸入資產供應商" value="{{$asset->vendor}}">
            </div>

            <div class="form-group">
                <label>耐用年限：</label>
                <input name="warranty" class="form-control" placeholder="請輸入資產耐用年限" value="{{$asset->warranty}}">
            </div>

            <div class="form-group">
                <label>備註：</label>
                <textarea name="submit" class="form-control" rows="10" value="{{$asset->remark}}"></textarea>
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
