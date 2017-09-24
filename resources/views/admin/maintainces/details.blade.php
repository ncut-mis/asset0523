@extends('admin.layouts.master')

@section('title', '維修明細')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            維修<small>維修明細</small>
        </h1>
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
        <p>&nbsp;</p>

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
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                        刪除
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                </div>
                                                <div class="modal-body">
                                                    確定刪除？
                                                </div>
                                                <div class="modal-footer">
                                                    <table style="text-align: right">
                                                        <tbody style="text-align: right">
                                                        <tr class="table-text" style="text-align: center">
                                                            <td width="100" >
                                                                <form action="{{ route('admin.maintainces.details.destroy',['mid'=>$maintaince->id,'id'=>$maintainceitem->id]) }}"method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <button class="btn btn-success">確定</button>
                                                                </form>
                                                            </td>
                                                            <td width="100">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    </div>
</div>
<!-- /.row -->
@endsection
