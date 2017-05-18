@extends('admin.layouts.master')

@section('title', '資產報修申請')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            資產報修申請 <small>請輸入資產問題</small>
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
        <form action="/admin/assets/{{$asset->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div>
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
                <label>資產狀態：</label>
                <input name="status" class="form-control" placeholder="請輸入資產狀態" value="{{$asset->status}}">
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <input name="keeper" class="form-control" placeholder="請輸入資產保管人" value="{{$asset->keeper}}">
            </div>

            <div class="form-group">
                <label>放置地點：</label>
                <input name="location" class="form-control" placeholder="請輸入資產放置地點" value="{{$asset->location}}">
            </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="30" style="text-align: center">id</th>
                                <th >資產名稱</th>
                                <th width="80" style="text-align: center">資產類別</th>
                                <th width="80" style="text-align: center">資產狀態</th>
                                <th width="80" style="text-align: center">可否租借</th>
                                <th width="80" style="text-align: center">放置地點</th>
                                <th width="100" style="text-align: center">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assets as $asset)
                                <tr>
                                    <td style="text-align: center">
                                        <a href="{{ route('admin.assets.edit', $asset->id) }}">{{ $asset->id }}</a>
                                    </td>
                                    <td style="text-align: center">
                                        <a href="{{ route('admin.assets.edit', $asset->id) }}">{{ $asset->name }}</a>
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

            <div class="text-right">
                <label>問題描述：</label>
                <input name="problem" class="form-control" placeholder="請輸入資產放置地點">
                <button type="submit" class="btn btn-success">申請</button>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
