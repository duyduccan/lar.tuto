@extends('admin.layouts.glance')
@section('title')
    Quản trị menuitems
@endsection
@section('content')
    <h1>Xóa menu {{ $menu->id. ' : ' .$menu->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="menu" action="{{url('admin/menuitems/'.$menu->id.'/delete')}}" method="post" class="form-horizontal">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>
@endsection

