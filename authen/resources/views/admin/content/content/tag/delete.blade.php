@extends('admin.layouts.glance')
@section('title')
    Quản trị tag
@endsection
@section('content')
    <h1>Xóa trang {{ $tag->id. ' : ' .$tag->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="tag" action="{{url('admin/content/tag/'.$tag->id.'/delete')}}" method="post" class="form-horizontal">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
@endsection

