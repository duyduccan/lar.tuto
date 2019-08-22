@extends('admin.layouts.glance')
@section('title')
    Quản trị menu
@endsection
@section('content')
    <h1>Sửa menu {{ $menu->id. ' : ' .$menu->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form name="menu" action="{{url('admin/menu/'.$menu->id)}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" value="{{$menu->name}}" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1" id="focusedinput" value="{{$menu->slug}}" placeholder="Default Input">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Kiểu menu item</label>
                    <div class="col-sm-8">
                        <select id="menu-type" name="type">
                            @foreach($types as $type_id => $type)
                                <?php $selected = ($type_id == $menu->type) ? 'selected' : ' ' ?>
                                <option value="{{$type_id}}" {{$selected}} data-type="type-{{$type_id}}">- {{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-1" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Shop category</label>
                    <div class="col-sm-8">
                        <input name="shop_category">
                    </div>
                </div>

                <div id="type-2" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Shop product</label>
                    <div class="col-sm-8">
                        <input name="shop_product">
                    </div>
                </div>

                <div id="type-3" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content category</label>
                    <div class="col-sm-8">
                        <input name="content_category">
                    </div>
                </div>

                <div id="type-4" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content post</label>
                    <div class="col-sm-8">
                        <input name="content_post">
                    </div>
                </div>

                <div id="type-5" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content page</label>
                    <div class="col-sm-8">
                        <input name="content_page">
                    </div>
                </div>

                <div id="type-6" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content tag</label>
                    <div class="col-sm-8">
                        <input name="content_tag">
                    </div>
                </div>

                <div id="type-7" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Custom link</label>
                    <div class="col-sm-8">
                        <input name="custom_link">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Final Link</label>
                    <div class="col-sm-8">
                        <input type="text" name="link" readonly value="{{$menu->link}}" class="form-control1" id="focusedinput" placeholder="Auto fill link">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Icon</label>
                    <div class="col-sm-8">
                        <input type="text" name="icon" value="{{$menu->icon}}" class="form-control1" id="focusedinput" placeholder="EX: fa fa-shop">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Cha</label>
                    <div class="col-sm-8">
                        <select name="parent_id">
                            <option value="0">Mặc định</option>
                            @foreach($menuitems as $menuitem)
                                <?php $selected = ($menuitem['id'] == $menu->parent_id) ? 'selected' : ' ' ?>
                                <option value="{{$menuitem['id']}}" {{$selected}}>{{str_repeat('-', $menuitem['level'] - 1).' '.$menuitem['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Thuộc menu</label>
                    <div class="col-sm-8">
                        <select name="menu_id">
                            @foreach($menus as $menu)
                                <?php $selected = ($menu['id'] == $menu->menu_id) ? 'selected' : ' ' ?>
                                <option value="{{$menu->id}}" {{$selected}}>{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8">
                        <textarea name="desc" id="txtarea1"  cols="50" rows="4" class="form-control1 mytinymce">{{$menu->desc}}</textarea></div>
                </div>

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.menu-type').hide();

            var current_type = $('#menu-type').find('option:selected').data('type');
            $('.menu-type').hide();
            if($('#'+current_type).length) {
                $('#' + current_type).show();
            }
            $('#menu-type').on('change',function(){
                var value = $(this).val();
                var type = $(this).find('option:selected').data('type');

                $('.menu-type').hide();
                if($('#'+type).length){
                    $('#'+type).show();
                }
            });
        });
    </script>
@endsection

