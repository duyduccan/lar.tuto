@extends('admin.layouts.glance')
@section('title')
    Quản trị trang
@endsection
@section('content')
    <h1>Xóa trang {{ $page->id. ' : ' .$page->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="page" action="{{url('admin/content/page/'.$page->id.'/delete')}}" method="post" class="form-horizontal">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
@endsection

