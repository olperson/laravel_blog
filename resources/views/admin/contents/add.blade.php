@extends('link')
@section('content')
    <body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i>首页 &raquo;
        <a href="{{url('admin/contents/index')}}">全部分类</a>&raquo;添加文章分类

    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>分类管理</h3>
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
        {{--        <div class="result_content">--}}
        {{--            <div class="short_wrap">--}}
        {{--                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a>--}}
        {{--                <a href="{{url('admin/category')}}"><i class="fa fa-recycle"></i>全部分类</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('/admin/contents/index')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                <tr>
                    <th width="120"><i class="require">*</i>主分类：</th>
                    <td>
                        <select name="_pid">
                            <option value="0">添加主分类</option>
                            @foreach($_name as $name)
                                <option value="{{$name->_id}}">{{$name->_type}}</option>
                            @endforeach

                        </select>
                        <span><i class="fa fa-exclamation-circle yellow"></i>必选</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>分类名称：</th>
                    <td>
                        <input type="text" name="_type">
                        <span><i class="fa fa-exclamation-circle yellow"></i>必填</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>标题：</th>
                    <td>
                        <input type="text" class="lg" name="_title">
                    </td>
                </tr>
                <tr>
                    <th>关键词：</th>
                    <td>
                        <textarea name="_keywords"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>详细内容：</th>
                    <td>
                        <textarea class="lg" name="_description"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" class="sm" name="_order">
                        <span><i class="fa fa-exclamation-circle yellow"></i>必填</span>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection
