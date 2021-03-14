@extends('layout.authentication')
@section('title', 'Login')


@section('content')

    <div class="auth_brand">
        <a class="navbar-brand" href="#"><img src="{{ asset('assets/images/icon.svg') }}" width="50"
                                              class="d-inline-block align-top mr-2" alt="">Zh`Blog</a>
    </div>
    <div class="card">
        <div class="header">
            <p class="lead">登录</p>
        </div>
        <div class="body">
            <form action="{{url('admin/login')}}" method="post" id="formId">
                {{csrf_field()}}
                @if(!empty(session('errors')))
                    <div class="alert alert-danger" role="alert">{{session('errors')}}</div>
                @endif


                <div class="form-group c_form_group">
                    <label>用户名</label>
                    <input name="uid" type="text" class="form-control" placeholder="输入你的用户名">
                </div>
                <div class="form-group c_form_group">
                    <label>密码</label>
                    <input name="passwd" type="password" class="form-control" placeholder="输入密码">
                </div>

                <div class="form-group c_form_group">
                    <label>验证码 </label>

                    <a style="float:right" href="javascript:void(0)" onclick="reimg()" onMouseOut="hideImg()"
                       onmouseover="showImg()"><i class="icon-magnifier-add"></i></a>
                    <div id="wxImg" style="display:none;height:50px;position:absolute;">
                        <img class="rounded" id="img" src="{{url('/verifycode')}}">
                    </div>
                    <input name="captcha" type="password" class="form-control" placeholder="验证码">

                </div>
                <div class="form-group clearfix">
                    <label class="fancy-checkbox element-left">
                        <input type="checkbox">
                        <span>记住我</span>
                    </label>
                </div>

                <div class="bottom">
                    <a class="btn btn-dark btn-lg btn-block" onclick="formId.submit()">登录</a>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">

        function showImg() {
            document.getElementById("wxImg").style.display = 'block';
        }

        function hideImg() {
            document.getElementById("wxImg").style.display = 'none';

        }

        //验证码点击切换事件
        function reimg() {
            var img = document.getElementById("img");
            img.src = "{{url('/verifycode')}}?rnd=" + Math.random();
        }

    </script>
@stop
