@extends('layout.master')
@section('parentPageTitle', 'Forms')
@section('title', 'Form Validation')


@section('content')

    <!-- Page header section  -->
    <div class="block-header">
        <div class="row clearfix">
            <div class="col-xl-5 col-md-5 col-sm-12">
                <h1>Hi, 欢迎回来!</h1>
            </div>
            <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">

            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="body">
                    <form action="{{url('/admin/article/index/'.$_content->art_id)}}" id="basic-form" method="post"
                          novalidate>
                        <input type="hidden" name="_method" value="put">
                        {{csrf_field()}}
                        @if(!empty(session('errors')))
                            <div class="alert alert-warning" role="alert">{{session('errors')}}</div>
                        @endif
                        <div class="form-group c_form_group ">
                            <label>文章标题</label>
                            <input value="{{$_content->art_title}}" name="art_title" type="text" class="form-control"
                                   required>
                        </div>
                        <div class="c_form_group">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12">
                                    <label>作者</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-user"></i></span>
                                        </div>
                                        <input value="{{$_content->art_editor}}" name="art_editor" type="text"
                                               class="form-control" required
                                               placeholder="admin">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <label>文章略缩图URL</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-picture"></i></span>
                                        </div>
                                        <input name="art_thumb" type="text" class="form-control"
                                               value="{{$_content->art_thumb}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group c_form_group">
                            <label>文章摘要</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-directions"></i></span>
                                </div>
                                <input name="art_description" type="text" class="form-control"
                                       placeholder="留空自动截取文章前55个字" value="{{$_content->art_description}}">
                            </div>
                        </div>
                        {{--                    markdown开始--}}

                        <div class="form-group c_form_group">
                            <p class="margin-bottom-30">Markdown编辑器</p>
                            <div>
                                <div id="editormd_id">
                                    <textarea name="art_content" rows="20">{{$_content->art_content}}</textarea>
                                </div>
                            </div>

                        </div>


                        {{--                    markdown结束--}}
                        {{--                        tag input开始--}}


                        <div class="form-group c_form_group">
                            <label>添加标签</label>
                            <div class="input-group demo-tagsinput-area">
                                <input name="art_tag" type="text" class="form-control" data-role="tagsinput"
                                       value="Javascript,Css,HTML,😟,😊">
                            </div>
                        </div>

                        {{--                        tags input 结束--}}
                        {{--                        复选框开始--}}
                        <div class="col-md-4 form-group  c_form_group">
                            <label>分类选择</label>
                            <div class="multiselect_div">
                                <select id="multiselect5" name="pid" class="multiselect-custom">
                                    @foreach($_name as $name)
                                        @if($name->_pid==0)
                                            <optgroup label="{{$name->_type}}">
                                                @foreach($content as $m)
                                                    @if($m->_pid==$name->_id)
                                                        <option value="{{$m->_id}}"
                                                                @if($_content->pid==$m->_id)
                                                                selected
                                                                @endif>
                                                            {{$m->_type}}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </optgroup>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--                        复选框结束--}}
                        <br>
                        <button onclick="sub()" type="submit" class="btn btn-primary theme-bg">发布</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>

@stop

@section('page-styles')

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-markdown/bootstrap-markdown.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/parsleyjs/css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/multi-select/css/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">

    {!! editor_css() !!}

@stop

@section('vendor-script')
    <script src="{{ asset('assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/markdown/markdown.js') }}"></script>
    <script src="{{ asset('assets/vendor/to-markdown/to-markdown.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
    <script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('assets/vendor/parsleyjs/js/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

@stop

@section('page-script')
    <script>
        function sub(data) {
            if (data.status == 0) {
                swal("Good job!", "clicked the button!", "success");
            } else {
                alert('弹出层');
            }

        }

    </script>

    <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>

    <script>
        $(function () {
            // markdown editor
            var initContent = '<h4>Hello there</h4> ' +
                '<p>How are you? I have below task for you :</p> ' +
                '<p>Select from this text... Click the bold on THIS WORD and make THESE ONE italic, ' +
                'link GOOGLE to google.com, ' +
                'test to insert image (and try to tab after write the image description)</p>' +
                '<p>Test Preview And ending here...</p> ' +
                '<p>Click "List"</p> Enjoy!';

            $('#markdown-editor').text(toMarkdown(initContent));
        });
        $(function () {
            // validation needs name of the element
            $('#food').multiselect();

            // initialize after multiselect
            $('#basic-form').parsley();
        });
    </script>

    <script src="{{ asset('assets/js/pages/ui/dialogs.js') }}"></script>

    {!! editor_js() !!}
@stop