@extends('admin.layouts.master')

@section('title', '廠商管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            廠商管理 <small>廠商列表</small>
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="input-group custom-search-form">
    <form action="{{ route('admin.vendors.show') }}" method="POST">
        {{ csrf_field() }}
        <span class="input-group-btn">
    <input name="Search" class="form-control" placeholder="Search...">
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
        </span>
    </form>
</div>

<div class="row" style="margin-bottom: 20px; text-align: right">
    <div class="col-lg-12">
        <a href="{{ route('admin.vendors.create') }}" class="btn btn-success">新建廠商</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="100" style="text-align: center">廠商編號</th>
                        <th width="200" style="text-align: center">廠商名稱</th>
                        <th width="110" style="text-align: center">廠商聯絡人</th>
                        <th width="100" style="text-align: center">廠商電話</th>
                        <th width="300" style="text-align: center">廠商地址</th>
                        <th width="100" style="text-align: center">銀行名稱</th>
                        <th width="100" style="text-align: center">銀行帳戶</th>
                        <th width="200" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($vendors as $vendors)
                    <tr>
                        <td style="text-align: center">{{ $vendors->id }}</td>
                        <td style="text-align: center">
                            <a href="{{ route('admin.vendors.data', $vendors->id) }}">{{ $vendors->name }}</a>
                        </td>
                        <td style="text-align: center">{{ $vendors->cantactperson}}</td>
                        <td style="text-align: center">{{ $vendors->phone }}</td>
                        <td style="text-align: center">{{ $vendors->address }}</td>
                        <td style="text-align: center">{{ $vendors->bankname }}</td>
                        <td style="text-align: center">{{ $vendors->bankaccount }}</td>
                        <td>
                            <table >
                                <tbody>
                                <tr class="table-text" style="text-align: center">
                                    <td width="100" >
                                        <a class="btn btn-primary" role="button" href="{{ route('admin.vendors.edit', $vendors->id) }}" >修改</a>
                                    </td>
                                    <td width="100">
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
                                                        <h4 class="modal-title" id="myModalLabel">提示訊息</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        確定刪除？
                                                    </div>
                                                    <div class="modal-footer">
                                                        <table style="text-align: right">
                                                            <tbody style="text-align: right">
                                                            <tr class="table-text" style="text-align: center">
                                                                <td width="100" >
                                                                    <form action="{{ route('admin.vendors.destroy', $vendors->id) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <button class="btn btn-danger">刪除</button>
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
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
