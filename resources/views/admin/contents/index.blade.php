@extends('link')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i>首页 &raquo; 全部分类
    </div>
    <!--面包屑导航 结束-->


    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/contents/index/create')}}"><i class="fa fa-plus"></i>新增分类</a>
                    {{--                    <a id="but" onclick="fun()"><i class="fa fa-recycle"></i>批量删除</a>--}}
                    <a href="{{url('admin/contents/index')}}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>分类名称</th>
                        <th>标题</th>
                        <th>查看次数</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->_id}})" value="{{$v->_order}}">
                            </td>
                            <td class="tc">{{$v->_id}}</td>
                            <td>
                                <a href="#">{{$v->_type}}</a>
                            </td>
                            <td>{{$v->_title}}</td>
                            <td>{{$v->_view}}</td>
                            <td><a href="{{url('admin/contents/index/'.$v->_id.'/edit')}}">编辑</a>
                                <a href="javascript:" onclick="delCate({{$v->_id}})">删除</a>
                            </td>
                        </tr>

                    @endforeach
                </table>

                {{--                <div class="page_list">--}}
                {{--                    <ul>--}}
                {{--                        <li class="disabled"><a href="#">&laquo;</a></li>--}}
                {{--                        <li class="active"><a href="#">1</a></li>--}}
                {{--                        <li><a href="#">2</a></li>--}}
                {{--                        <li><a href="#">3</a></li>--}}
                {{--                        <li><a href="#">4</a></li>--}}
                {{--                        <li><a href="#">5</a></li>--}}
                {{--                        <li><a href="#">&raquo;</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
    <script>
        function changeOrder(obj, _id) {
            var _order = $(obj).val();
            $.post("{{url('admin/content/changeorder')}}", {
                '_token': '{{csrf_token()}}',
                '_id': _id,
                '_order': _order
            }, function (data) {
                if (data.status == 0) {
                    layer.msg(data.msg, {icon: 6});
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }

        //删除分类
        function delCate(_id) {
            layer.confirm('您确定要删除这个分类吗？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.post("{{url('/admin/contents/index')}}/" + _id, {
                    '_method': 'delete',
                    '_token': "{{csrf_token()}}"
                }, function (data) {
                    if (data.status == 0) {
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    } else {
                        layer.msg(data.msg, {icon: 5});
                    }
                });
//            layer.msg('的确很重要', {icon: 1});
            }, function () {

            });
        }

    </script>
@endsection
