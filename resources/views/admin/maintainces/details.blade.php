@extends('admin.layouts.master')

@section('title', '維修明細')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            維修<small>維修明細</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 維修管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/maintainces/{{$maintaince->id}}/detail" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label>維修項目：</label>
                <input name="name" class="form-control" placeholder="請輸入維修項目">
            </div>

            <div class="form-group">
                <label>金額：</label>
                <input name="amount" class="form-control" placeholder="請輸入金額">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">增加維修項目</button>
            </div>
        </form>

        @if (count($maintainceitems) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    已記錄的維修項目
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- 表頭 -->
                        <thead>
                        <th width="300" style="text-align: center">維修項目</th>
                        <th width="300" style="text-align: center">金額</th>
                        <th width="100" style="text-align: center">功能</th>
                        </thead>

                        <!-- 表身 -->
                        <tbody>
                        @foreach ($maintainceitems as $maintainceitem)
                            <tr>
                                <!-- 任務名稱 -->
                                <td class="table-text" style="text-align: center">
                                    <div>{{ $maintainceitem->name }}</div>
                                </td>
                                <td class="table-text" style="text-align: center">
                                    <div>{{ $maintainceitem->amount }}</div>
                                </td>
                                <td class="table-text" style="text-align: center">
                                    <a class="btn btn-primary" href="{{ route('admin.maintainces.edit',['mid'=>$maintaince->id,'id'=>$maintainceitem->id]) }}" role="button">修改</a>
                                </td>
                                <!-- 刪除按鈕 -->
                                <td>
                                    <form action="{{ route('admin.maintainces.details.destroy',['mid'=>$maintaince->id,'id'=>$maintainceitem->id]) }}"method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button class="btn btn-primary">刪除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="/admin/maintainces/{{$maintaince->id}}/complete" method="POST" role="form">
                {{ csrf_field() }}
                <div class="text-right">
                    <button type="submit" class="btn btn-success">維修完成</button>
                </div>
            </form>
        @endif


        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
