@extends('admin.layouts.master')

@section('title', '租借資產')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            租借 <small>資產</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/assets/{{$asset->id}}/lending" method="POST" role="form">
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
                <label>租借資產名稱：</label>
                <label>{{$asset->name}}</label>
            </div>
            <div class="form-group">
                <label>租借日期：</label>
                <input name="lenttime" class="form-control" placeholder="請輸入日期與時間" value="{{$today->toDateString()}}">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">租借</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
