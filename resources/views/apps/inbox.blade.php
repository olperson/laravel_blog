@extends('layout.master')
@section('parentPageTitle', 'Apps')
@section('title', 'Inbox')


@section('content')

    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-6 col-md-5 col-sm-12">
                <h1>Hi, Welcomeback!</h1>
                <span>JustDo @yield('title'),</span>
            </div>
            <div class="col-xl-6 col-md-7 col-sm-12 text-md-right">
                <a href="{{route('pages.settings')}}" class="btn btn-default">Settings</a>
                <a href="{{route('apps.inboxcompose')}}" class="btn btn-dark">Compose</a>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light page_menu mb-1">
                <a class="navbar-brand" href="javascript:void(0);">M.</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-muted"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    {{--                <ul class="navbar-nav mr-auto">--}}
                    {{--                    <li class="nav-item active"><a class="nav-link" href="javascript:void(0);">Gmail</a></li>--}}
                    {{--                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Yahoo</a></li>--}}
                    {{--                    <li class="nav-item"><a class="nav-link" href="javascript:void(0);">Outlook</a></li>--}}
                    {{--                    <li class="nav-item dropdown">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown">Add more</a>--}}
                    {{--                        <div class="dropdown-menu">--}}
                    {{--                            <a class="dropdown-item" href="javascript:void(0);">MailChimp</a>--}}
                    {{--                            <a class="dropdown-item" href="javascript:void(0);">Hotmail</a>--}}
                    {{--                            <a class="dropdown-item" href="javascript:void(0);">Yandex</a>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}
                    {{--                </ul>--}}
                    <div class="ml-auto">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Mail"
                                       aria-label="Search Mail" aria-describedby="search-mail">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="search-mail"><i
                                                class="icon-magnifier"></i></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="mail-inbox">
                    <div class="mobile-left">
                        <a href="javascript:void(0);" class="btn btn-primary theme-bg toggle-email-nav"><i
                                    class="fa fa-bars"></i></a>
                    </div>
                    <div class="mail-left">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab"
                                                    href="#Home-withicon"><i class="fa fa-home"></i> 已发布</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile-withicon"><i
                                            class="fa fa-user"></i> 草稿</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact-withicon"><i
                                            class="fa fa-vcard"></i> 垃圾箱</a></li>
                        </ul>


                    </div>
                    <div class="mail-right check-all-parent">
                        <div class="mail-action">
                            <div>
                                <div class="fancy-checkbox d-inline-block">
                                    <label>
                                        <input class="check-all" type="checkbox" name="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <a href="javascript:void(0);" class="btn btn-default btn-sm hidden-sm"><i
                                            class="fa fa-refresh"></i></a>
                                <div class="btn-group">
                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                class="fa fa-tag"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);">按钮1</a>
                                        <a class="dropdown-item" href="javascript:void(0);">按钮2</a>
                                        <a class="dropdown-item" href="javascript:void(0);">按钮3</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="pagination-email d-flex">
                                    <p>1-50/295</p>
                                    <div class="btn-group m-l-20">
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                    class="fa fa-angle-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                    class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">


                            {{--                            已发布开始--}}
                            <div class="tab-pane show active" id="Home-withicon">
                                <ul class="mail-list list-unstyled">
                                    @foreach($arts as $v)
                                        <li>

                                            <div class="md-left">
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox" name="checkbox" class="checkbox-tick">
                                                    <span></span>
                                                </label>
                                                <a href="javascript:void(0);" class="mail-star active"><i
                                                            class="fa fa-star"></i></a>
                                            </div>
                                            <div>

                                                <div class="form-group c_form_group ">
                                                    <div class="title"><a><b>{{$v->art_title}}</b></a>
                                                        {{--                        tag input开始--}}
                                                        <input onchange="changetags(this,{{$v->art_id}})" name="art_tag"
                                                               type="text" class="form-control" data-role="tagsinput"
                                                               value="{{$v->art_tag}}">


                                                        {{--                        tags input 结束--}}
                                                    </div>

                                                    <p class="dep"><span class="msg">{{$v->art_content}}</span></p>
                                                    <hr/>
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-6">
                                                                <span class="time">{{date('Y年m月d日 H时i分',$v->art_time)}}</span>
                                                                <span class="time"><h6><i
                                                                                class="fas  icon-eyeglasses">:{{$v->art_view}}</i></h6></span>
                                                            </div>
                                                            <div class="col-md-12 col-lg-6">
                                                        <span class="time float-right">
                                                <button onclick="" type="button" class="btn btn-sm btn-default"
                                                        title="编辑"><i
                                                            class="fa fa-edit"></i></button>
                                        <button onclick="del({{$v->art_id}})" data-type="ajax-loader" type="button"
                                                class="btn btn-sm btn-danger" title="删除"><i
                                                    class="fa fa-trash"></i></button></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{--                            已发布结束--}}
                            {{--                            草稿开始--}}
                            <div class="tab-pane" id="Profile-withicon">
                                <ul class="mail-list list-unstyled">
                                    <li>
                                        <div class="md-left">
                                            <label class="fancy-checkbox">
                                                <input type="checkbox" name="checkbox" class="checkbox-tick">
                                                <span></span>
                                            </label>
                                            <a href="javascript:void(0);" class="mail-star active"><i
                                                        class="fa fa-star"></i></a>
                                        </div>
                                        <div class="md-right">
                                            <div class="title"><a>我是测试文件</a></div>
                                            <p class="dep">Hello -
                                                <span class="msg">That's great, see you on Thursday!</span></p>
                                            <span class="time">23 Jun</span>
                                            <span class="time">
                                                <button onclick="" type="button" class="btn btn-sm btn-default"
                                                        title="编辑"><i
                                                            class="fa fa-edit"></i></button>
                                        <button onclick="" data-type="ajax-loader" type="button"
                                                class="btn btn-sm btn-danger" title="删除"><i
                                                    class="fa fa-trash"></i></button></span>
                                        </div>

                                    </li>

                                </ul>
                            </div>
                            {{--                            草稿结束--}}
                            {{--                            回收站tab开始--}}
                            <div class="tab-pane" id="Contact-withicon">
                                <ul class="mail-list list-unstyled">
                                    <li>
                                        <div class="md-left">
                                            <label class="fancy-checkbox">
                                                <input type="checkbox" name="checkbox" class="checkbox-tick">
                                                <span></span>
                                            </label>
                                            <a href="javascript:void(0);" class="mail-star active"><i
                                                        class="fa fa-star"></i></a>
                                        </div>
                                        <div class="md-right">
                                            <div class="title"><a>我是测试文件1</a></div>
                                            <p class="dep">Hello - <span
                                                        class="msg">That's great, see you on Thursday!</span></p>
                                            <span class="time">23 Jun</span>
                                            <span class="time">
                                                <button onclick="" type="button" class="btn btn-sm btn-default"
                                                        title="编辑"><i
                                                            class="fa fa-edit"></i></button>
                                        <button onclick="" data-type="ajax-loader" type="button"
                                                class="btn btn-sm btn-danger" title="删除"><i
                                                    class="fa fa-trash"></i></button></span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            {{--                            回收站tab结束--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@stop

@section('vendor-script')

    <script type="text/javascript" src="{{url('/style/js/layer.js')}}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
@stop

@section('page-script')

    <script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>
    <script>
        //异步删除
        function del(art_id) {
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
                        $.post("{{url('/admin/article/index')}}/" + art_id, {
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

        /*

         */
        $('.toggle-email-nav').on('click', function () {
            $('.mail-left').toggleClass('open');
        });

        //异步标签修改
        function changetags(obj, art_id) {
            var art_tag = $(obj).val();
            $.post("{{url('admin/article/changetags')}}", {
                '_token': '{{csrf_token()}}',
                'art_id': art_id,
                'art_tag': art_tag
            });
        }
    </script>

@stop