@extends('layouts.app') 
@section('content')
<a class="btn btn-default pull-right" href="/home">Trở về</a>
<div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 69px">
        @if (Session::has('success'))
        <div style="margin-top: 100px">
            <div class="alert alert-success" role="alert">
                <strong>Thông báo:</strong> {{ Session::get('success') }} và đang chờ phê duyệt
            </div>
        </div>
        @endif
        </div>
        <div class="col-md-8 col-md-offset-2" style="margin-top: 9px">
        <div class="panel panel-default" style="border-top-color: #e74c3c;">
            <div class="panel-heading">Thông tin cá nhân :</div>
            <div class="panel-body">
            </div>
        </div>
    </div>
</div>
@endsection