@extends('admin.layouts.master')

@section('title', '廠商管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            廠商管理 <small>廠商列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 廠商管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="input-group custom-search-form">
    <form action="{{ route('admin.vendor.show') }}" method="POST">
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
                        <th width="100" style="text-align: center">編號</th>
                        <th>廠商名稱</th>
                        <th width="100" style="text-align: center">廠商聯絡人</th>
                        <th width="100" style="text-align: center">廠商電話</th>
                        <th width="100" style="text-align: center">廠商地址</th>
                        <th width="100" style="text-align: center">銀行名稱</th>
                        <th width="100" style="text-align: center">銀行帳戶</th>
                        <th width="100" style="text-align: center">備註</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($vendors as $vendors)
                    <tr>
                        <td style="text-align: center">{{ $vendors->id }}</td>
                        <td style="text-align: center">{{ $vendors->name }}</td>
                        <td style="text-align: center">{{ $vendors->cantactperson}}</td>
                        <td style="text-align: center">{{ $vendors->phone }}</td>
                        <td style="text-align: center">{{ $vendors->address }}</td>
                        <td style="text-align: center">{{ $vendors->bankname }}</td>
                        <td style="text-align: center">{{ $vendors->bankaccount }}</td>
                        <td style="text-align: center">{{ $vendors->remark }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.vendors.edit', $vendors->id) }}">編輯</a>
                                /
                                <form action="{{ route('admin.vendors.destroy', $vendors->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">刪除</button>
                                </form>
                            </div>
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
