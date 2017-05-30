@extends('admin.layouts.master')

@section('title', '資產管理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            資產管理 <small>所有資產列表</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>資產管理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="input-group custom-search-form">
<form action="{{ route('admin.assets.search') }}" method="POST">
    {{ csrf_field() }}
    <span class="input-group-btn">
    <input name="Search" class="form-control" placeholder="Search...">
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
    </span>
</form>
</div>

<div class="row" style="margin-bottom: 20px; text-align: right" >

    <div class="col-lg-12">
        <a href="{{ route('admin.assets.create') }}" class="btn btn-success">建立新資產</a>
    </div>
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
                        <th width="80" style="text-align: center">資產類別</th>
                        <th width="100" style="text-align: center">資產狀態</th>
                        <th width="80" style="text-align: center">可否租借</th>
                        <th width="80" style="text-align: center">放置地點</th>
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
                        <td style="text-align: center">
                            @foreach($categories as $category)
                                @if($asset->category==$category->id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
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
