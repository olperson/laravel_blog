@extends('btindex')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i>首页 &raquo;
        <a href="{{url('admin/contents/index')}}">文章管理</a>&raquo;编辑文章

    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->


    <div class="container-fluid">
        <div class="result_title">
            @if(count(array($errors))>0)
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <div class="mark">
                            <p>{{$errors}}</p>
                        </div>
                    @endforeach
                @else
                    <div class="mark">
                        <p>{{$errors}}</p>
                    </div>
                @endif

            @endif
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    <form action="{{url('/admin/contents/index')}}" method="post">
        {{csrf_field()}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="col-md-12">
                        <tr>

                            <th>标题：</th>
                            <td>
                                <input type="text" class="lg" name="_title">
                            </td>
                        </tr>
                    </div>
                    <div class="col-md-12" style="margin-top: 5px">
                        <tr>
                            <th>作者：</th>
                            <td>
                                <input type="text" class="sm" name="_order">
                            </td>
                        <tr>
                    </div>
                    <div class="col-md-12" style="margin-top: 5px">
                        <tr>
                            <th>摘要：</th>
                            <td>
                                <input type="text" class="lg" name="_description">
                            </td>
                        </tr>
                    </div>
                    <div class="col-md-12" style="margin-top: 5px">
                        <div id="editormd_id">
                            <textarea name="content" style="display:none;"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;margin-block-end: 10px">
                        <tr>
                            <th></th>
                            <td>
                                <input type="submit" value="提交">
                                <input type="button" class="back" onclick="history.go(-1)" value="返回">
                            </td>
                        </tr>
                    </div>
                </div>
                <div class="col-md-3" style="margin-top: 50px">
                    <div class="col-md-12">
                        <tr>
                            <th width="120">分类：</th>
                            <td>
                                <select name="_id" class="selectpicker" data-live-search=“true”>
                                    @foreach($_name as $name)
                                        <option value="{{$name->_id}}">{{$name->_type}}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <tr>
                            <th>缩略图：</th>
                            <td>
                                <input type="text" class="sm" name="_title">
                            </td>
                        </tr>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <tr>
                            <th>关键词：</th>
                            <td>
                                <input type="text" name="_keywords">
                            </td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @parent
    {!! editor_js() !!}
@stop
{{--                <div class="col-md-6" style="margin-top: 50px"></div>--}}
{{--                <div class="col-md-4" style="margin-top: 50px">--}}
{{--                    <tr>--}}
{{--                        <th><i class="require">*</i>标题：</th>--}}
{{--                        <td>--}}
{{--                            <input type="text" class="lg" name="_title">--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                </div>--}}
{{--                <div class="col-md-3" style="margin-top: 50px">--}}
{{--                    <tr>--}}
{{--                        <th>详细内容：</th>--}}
{{--                        <div id="editormd_id">--}}
{{--                            <textarea name="_description"></textarea>--}}
{{--                        </div>--}}
{{--                    </tr>--}}
{{--                </div>--}}
{{--                <div class="col-md-3" style="margin-top: 50px">--}}


{{--                </div>--}}
{{--            <table class="add_tab">--}}
{{--                <tbody>--}}

{{--                <tr>--}}
{{--                    <th width="120"><i class="require">*</i>分类：</th>--}}
{{--                    <td>--}}
{{--                        <select name="_id">--}}
{{--                            @foreach($_name as $name)--}}
{{--                                <option value="{{$name->_id}}">{{$name->_type}}</option>--}}
{{--                            @endforeach--}}

{{--                        </select>--}}
{{--                        <span><i class="fa fa-exclamation-circle yellow"></i>必选</span>--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <th><i class="require">*</i>标题：</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" class="lg" name="_title">--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--                <tr>--}}
{{--                    <th><i class="require">*</i>缩略图：</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" class="lg" name="_title">--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>作者：</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" class="sm" name="_order">--}}
{{--                        <span><i class="fa fa-exclamation-circle yellow"></i>必填</span>--}}
{{--                    </td>--}}
{{--                <tr>--}}

{{--                <tr>--}}
{{--                    <th>描述：</th>--}}
{{--                    <td>--}}
{{--                        <textarea class="lg" name="_description"></textarea>--}}
{{--                    </td>--}}
{{--                </tr>--}}


{{--                <tr>--}}
{{--                    <th></th>--}}
{{--                    <td>--}}
{{--                        <input type="submit" value="提交">--}}
{{--                        <input type="button" class="back" onclick="history.go(-1)" value="返回">--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--    </div>--}}

