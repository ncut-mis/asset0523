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
@if(Auth::user()->previlege_id==3)
    <div class="col-lg-12">
        <a href="{{ route('admin.assets.create') }}" class="btn btn-success">建立新資產</a>
    </div>
    @endif
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="80" style="text-align: center">資產編號</th>
                        <th style="text-align: center">資產名稱</th>
                        <th width="80" style="text-align: center">資產類別</th>
                        <th width="100" style="text-align: center">資產狀態</th>
                        <th width="80" style="text-align: center">可否租借</th>
                        <th width="80" style="text-align: center">放置地點</th>
                        @if(Auth::user()->previlege_id==3)
                            <th width="250" style="text-align: center">功能</th>
                        @else
                            <th width="200" style="text-align: center">功能</th>
                        @endif
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
                        @if(Auth::user()->previlege_id==3)
                        <td>
                            <table>
                                <tbody>
                                <tr class="table-text" style="text-align: center">
                                    @if($asset->status=='待報廢')
                                        <td width="100" >
                                            <form action="{{ route('admin.assets.scrapped', $asset->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button class="btn btn-danger">報廢</button>
                                            </form>
                                        </td>
                                    @elseif($asset->status=='已報廢')
                                        <td width="75">
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
                                                                        <form action="{{ route('admin.assets.destroy', $asset->id) }}" method="POST">
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
                                    @elseif($asset->status=='正常使用中')
                                        <td width="100">
                                            <a class="btn btn-primary" href="{{ route('admin.assets.application', $asset->id) }}" role="button">報修</a>
                                        </td>
                                    @elseif($asset->status=='租借中')
                                        @foreach($lendings as $lending)
                                            @if($asset->id==$lending->asset_id)
                                                <td width="100">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                                        歸還
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
                                                                    確定歸還？
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <table style="text-align: right">
                                                                        <tbody style="text-align: right">
                                                                        <tr class="table-text" style="text-align: center">
                                                                            <td width="100" >
                                                                                <form action="{{ route('admin.lendings.return',['aid'=>$asset->id,'id'=>$lending->id]) }}" method="POST">
                                                                                    {{ csrf_field() }}
                                                                                    {{ method_field('PATCH') }}
                                                                                    <button class="btn btn-danger">歸還</button>
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
                                            @endif
                                        @endforeach
                                    @endif

                                    @if($asset->status=='正常使用中')
                                            @if($asset->lendable==1)
                                                <td width="100" >
                                                    <a class="btn btn-primary" role="button" href="{{ route('admin.lendings.create', $asset->id) }}" >租借</a>
                                                </td>
                                            @endif
                                        @endif

                                        @if(!($asset->status=='已報廢'||$asset->status=='待報廢'))
                                            <td width="100" >
                                                <a class="btn btn-primary" role="button" href="{{ route('admin.assets.edit', $asset->id) }}" >修改</a>
                                            </td>
                                        @endif
                                        @if(!($asset->status=='已報廢'))
                                        <!-- 刪除按鈕 -->
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
                                                                            <form action="{{ route('admin.assets.destroy', $asset->id) }}" method="POST">
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
                                        @endif
                                </tr>
                                </tbody>
                            </table>
                        </td>

                        @else
                            <td>
                                <table >
                                    <tbody>
                                    <tr class="table-text" style="text-align: center">
                                        @if(!($asset->status=='待報廢'||$asset->status=='已報廢'))
                                                <td width="100" >
                                                    <a class="btn btn-primary" href="{{ route('admin.assets.application', $asset->id) }}" role="button">報修</a>
                                                </td>
                                            @if($asset->lendable==1)
                                                <td width="100" >
                                                    <a class="btn btn-primary" role="button" href="{{ route('admin.lendings.create', $asset->id) }}" >租借</a>
                                                </td>
                                                @foreach($lendings as $lending)
                                                    @if($asset->id==$lending->asset_id)
                                                        @if($asset->status=='租借中')
                                                            <td width="100" >
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                                                    歸還
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
                                                                                確定歸還？
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <table style="text-align: right">
                                                                                    <tbody style="text-align: right">
                                                                                    <tr class="table-text" style="text-align: center">
                                                                                        <td width="100" >
                                                                                            <form action="{{ route('admin.lendings.return',['aid'=>$asset->id,'id'=>$lending->id]) }}" method="POST">
                                                                                                {{ csrf_field() }}
                                                                                                {{ method_field('PATCH') }}
                                                                                                <button class="btn btn-danger">歸還</button>
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
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
