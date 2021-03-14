@extends('layout.master')
@section('parentPageTitle', 'Tables')
@section('title', '文章分类')


@section('content')

    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-5 col-md-5 col-sm-12">
                <h1>欢迎回来！</h1>
                <span>JustDo @yield('title'),</span>
            </div>
            <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">

            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>分类列表<small>您可以在下方编辑分类详情</small></h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu bg-danger">
                                <li><a href="javascript:void(0);" class="fa fa-trash">删除选中</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                            <thead>
                            <tr>

                                <th>排序</th>
                                <th>ID</th>
                                <th>分类名称</th>
                                <th>标题</th>
                                <th>查看次数</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>排序</th>
                                <th>ID</th>
                                <th>分类名称</th>
                                <th>标题</th>
                                <th>查看次数</th>
                                <th>操作</th>
                            </tr>
                            </tfoot>
                            @foreach($data as $v)
                                <tr>
                                    <td>
                                        <input type="text" onchange="changeOrder(this,{{$v->_id}})"
                                               value="{{$v->_order}}">
                                    </td>
                                    <td>{{$v->_id}}</td>
                                    <td>
                                        <a>{{$v->_type}}</a>
                                    </td>
                                    <td>{{$v->_title}}</td>
                                    <td>{{$v->_view}}</td>
                                    <td>
                                        <button onclick="window.open('{{url('admin/contents/index/'.$v->_id.'/edit')}}')"
                                                type="button" class="btn btn-sm btn-default" title="编辑"><i
                                                    class="fa fa-edit"></i></button>
                                        <button data-type="ajax-loader" onclick="del({{$v->_id}})" type="button"
                                                class="btn btn-sm btn-danger" title="删除"><i
                                                    class="fa fa-trash"></i></button>
                                    </td>
                                    {{--                                <td><a href="{{url('admin/contents/index/'.$v->_id.'/edit')}}">编辑</a>--}}
                                    {{--                                    <a href="javascript:" onclick="delCate({{$v->_id}})">删除</a>--}}
                                    {{--                                </td>--}}
                                </tr>

                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
@stop
@section('vendor-script')
    <script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
@stop

@section('page-script')
    <script>
        function del(_id) {
            // 二次确认弹框
            swal({
                    title: "确定?",
                    text: "该操作无法撤回",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "确定",
                    cancelButtonText: "取消",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    showLoaderOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        // 朝后端发送ajax请求删除数据之后 再弹下面的提示框
                        $.post("{{url('/admin/contents/index')}}/" + _id, {
                                '_method': 'delete',
                                '_token': "{{csrf_token()}}"
                            },
                            function (data) {  // args = {'code':'','msg':''}
                                // 判断响应状态码 然后做不同的处理
                                if (data.status == 0) {
                                    swal("删除", data.msg, "success");
                                    setTimeout(function () {
                                        //使用setTimeout（）方法设定定时2000毫秒

                                        window.location.reload();
                                    }, 1500);//页面刷新

                                } else {
                                    swal('data.msg', 'error')
                                }
                            }
                        )

                    } else {
                        swal("成功取消！");
                    }
                });
        }


        function changeOrder(obj, _id) {
            var _order = $(obj).val();
            $.post("{{url('admin/content/changeorder')}}", {
                '_token': '{{csrf_token()}}',
                '_id': _id,
                '_order': _order
            }, function (data) {
                if (data.status == 0) {
                    layer.msg(data.msg);
                    setTimeout(function () {
                        //使用setTimeout（）方法设定定时2000毫秒

                        window.location.reload();
                    }, 1500);//页面刷新
                } else {
                    layer.msg(data.msg);
                }
            });
        }


    </script>

    <script type="text/javascript" src="{{url('/style/js/layer.js')}}"></script>
    <script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@stop