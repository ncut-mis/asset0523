@extends('admin.layouts.master')

@section('title', '維修處理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            維修處理 <small>選擇維修方式</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 維修處理
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/maintainces/{{$maintaince->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label width="80">資產名稱：</label>
                <input name="name" class="col-lg-4,form-control" placeholder="請輸入資產名稱" value="{{$asset->name}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">保管人：</label>
                <input name="keeper" class="col-lg-4,form-control" placeholder="請輸入資產保管人" value="{{$asset->keeper}}" readonly>
            </div>

            <div class="form-group">
                <label width="80">放置地點：</label>
                <input name="location" class="col-lg-4,form-control" placeholder="請輸入資產放置地點" value="{{$asset->location}}" readonly>
            </div>

            @if(count($assetmaintainces)>0)
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    @foreach($assetmaintainces as $assetmaintaince)
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
                            </a>
                        </h4>
                    </div>

                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>

                        @endforeach
                </div>
                @endif

            <div class="form-group">
                <label>選擇報修處理方式</label>
                <select name="method" class="form-control">
                        <option value="未選擇">未選擇</option>
                        <option value="廠商維修">廠商維修</option>
                        <option value="自行維修">自行維修</option>
                        <option value="不修">不修</option>
                </select>
            </div>

        <div class="text-right">
            <button type="submit" class="btn btn-success">確定</button>
        </div>
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
