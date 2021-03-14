@extends('layout.authentication')
@section('title', 'repasswd')


@section('content')

    <div class="auth_brand">
        <a class="navbar-brand" href="#"><img src="{{ asset('assets/images/icon.svg') }}" width="50"
                                              class="d-inline-block align-top mr-2" alt="">Mooli</a>
    </div>
    <div class="card">
        <div class="header">
            <p class="lead">修改密码</p>
        </div>
        <div class="body">
            <button class="btn btn-signin-social"><i class="fa fa-facebook-official facebook-color"></i> Sign in with
                Facebook
            </button>
            <div class="separator-linethrough"><span>OR</span></div>
            <form action="" method="post" id="formId">
                {{csrf_field()}}
                @if(count($errors)>0)
                    <div class="mark">
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <div class="form-group c_form_group">
                    <label>原密码</label>
                    <input name="passwd_o" type="password" class="form-control" placeholder="">
                </div>
                <div class="form-group c_form_group">
                    <label>新密码</label>
                    <input name="passwd" type="password" class="form-control" placeholder="密码仅支持字母以及数字">
                </div>
                <div class="form-group c_form_group">
                    <label>确认密码</label>
                    <input name="passwd_confirmation" type="password" class="form-control" placeholder="密码仅支持字母以及数字">
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block" onclick="formId.submit()">Register</button>

            </form>
        </div>
    </div>

@stop
