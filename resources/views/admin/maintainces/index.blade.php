@extends('admin.layouts.master')

@section('title', '報修管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            報修管理 <small>所有報修列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>報修管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="input-group custom-search-form">
<form action="{{ route('admin.maintainces.Search') }}" method="POST">
    {{ csrf_field() }}
    <span class="input-group-btn">
    <input name="Search" class="form-control" placeholder="Search...">
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
    </span>
</form>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="30" style="text-align: center">id</th>
                        <th >資產名稱</th>
                        <th width="80" style="text-align: center">報修狀態</th>
                        <th width="80" style="text-align: center">維修方式</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($assets as $asset)
                    <tr>
                        <td style="text-align: center">
                            {{ $asset->id }}
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('admin.assets.data', $asset->id) }}">{{ $asset->name }}</a>
                        </td>
                        <td style="text-align: center">{{ $asset->status }}</td>
                        <td style="text-align: center">{{ $asset->lendable?'可':'否' }}</td>
                        <td style="text-align: center">{{ $asset->location }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.assets.edit', $asset->id) }}">修改</a>
                                / <a href="{{ route('admin.assets.application', $asset->id) }}">申請</a> /
                                <form action="{{ route('admin.assets.destroy', $asset->id) }}" method="POST">
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
