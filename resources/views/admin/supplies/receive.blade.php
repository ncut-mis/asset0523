@extends('admin.layouts.master')

@section('title', '領取耗材')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            領取耗材 <small>輸入耗材領取數量</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/supplies/{{$supply->id}}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label>領取員工：</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value={{ $user->id }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>耗材編號：</label>
                <input name="supply_id" class="form-control" value="{{$supply->id}}" disabled>
            </div>
            <div class="form-group">
                <label>耗材名稱：</label>
                <input name="name"  class="form-control" value="{{$supply->name}}" disabled>
            </div>
            <div class="form-group">
                <label>日期：</label>
                <input name="date" class="form-control" placeholder="請輸入日期與時間" value="{{$today->toDateString()}}">
            </div>

            <div class="form-group">
                <label>領取數量：</label>
                <input name="quantity" class="form-control" placeholder="請輸入領取數量">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">領取耗材</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
