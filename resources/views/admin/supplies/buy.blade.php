@extends('admin.layouts.master')

@section('title', '添購耗材')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            添購耗材 <small>輸入耗材購買數量</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/supplies/{{$supplies->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>耗材名稱：</label>
                <input  class="form-control" value="{{$supplies->name}}" readonly>
            </div>

            <div class="form-group">

                <label>數量：</label>
                <input name="quantity" class="form-control" placeholder="請輸入數量">
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-success">添購</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
