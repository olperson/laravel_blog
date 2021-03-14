<nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html"><img src="{{ asset('assets/images/icon.svg') }}" alt="Mooli Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-align-left"></i></button>
                </div>
                <form id="navbar-search" class="navbar-form search-form">
                    <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                    <input value="" class="form-control" placeholder="Search here..." type="text">
                </form>
            </div>
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown hidden-xs">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu"
                               data-toggle="dropdown">新建</a>
                            <div class="dropdown-menu pb-0 mt-0">
                                <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">分类</a>
                                <a class="dropdown-item pt-2 pb-2" href="javascript:void(0);">文章</a>
                            </div>
                        </li>
                        <li><a href="{{route('dashboard.repw')}}" class="icon-menu">修改密码</a></li>
                        <li class="dropdown hidden-xs">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="notification-dot msg"></span>
                            </a>
                            <ul class="dropdown-menu right_chat email mt-0 animation-li-delay">
                                <li class="header theme-bg mt-0 text-light">You have 4 New eMail</li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">James Wert <small class="float-right font-12">Just now</small></span>
                                                <span class="message">Update GitHub</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar2.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Folisise Chosielie <small class="float-right font-12">12min ago</small></span>
                                                <span class="message">New Messages</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar3.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Louis Henry <small class="float-right font-12">38min ago</small></span>
                                                <span class="message">Design bug fix</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="media mb-0">
                                            <img class="media-object" src="{{ asset('assets/images/xs/avatar4.jpg') }}" alt="">
                                            <div class="media-body">
                                                <span class="name">Debra Stewart <small class="float-right font-12">2hr ago</small></span>
                                                <span class="message">Fix Bug</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="hidden-xs"><a href="javascript:void(0);" id="btnFullscreen" class="icon-menu"><i
                                        class="fa fa-arrows-alt"></i></a></li>
                        <li><a href="{{route('dashboard.logout')}}" class="icon-menu"><i
                                        class="fa fa-power-off"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="recent_searche" style="display: none;">
                <div class="card mb-0">
                    <div class="header">
                        <h2>Recent search result</h2>
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);">Clear data</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-external-link"></i></a></li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item p-l-0 p-r-0">
                                <h6><a href="javascript:void(0);">Crush it - Bootstrap Admin Application Template &amp; Ui Kit</a></h6>
                                <p class="text-muted">It is a long established fact that a reader will be distracted.</p>
                                <div class="text-muted font-13">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><span class="badge badge-secondary margin-0">React</span></li>
                                        <li class="list-inline-item">Dec 27 2020</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="list-group-item p-l-0 p-r-0">
                                <h6><a href="javascript:void(0);">Epic Pro - HR &amp; Project Management Admin Template and UI Kit</a></h6>
                                <p class="text-muted">he point of using Lorem Ipsum is that it has a more-or-less English.</p>
                                <div class="text-muted font-13">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><span class="badge badge-success margin-0">HTML</span></li>
                                        <li class="list-inline-item">Oct 13 2020</li>
                                    </ul>
                                </div>
                            </li>
                            <li class="list-group-item p-l-0 p-r-0">
                                <h6><a href="javascript:void(0);">Qubes - Responsive Admin Dashboard Template</a></h6>
                                <p class="text-muted">Commodo excepteur non ut aliqua ex qui velit sed esse consequat in </p>
                                <div class="text-muted font-13">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><span class="badge badge-danger margin-0">Bootstrap</span></li>
                                        <li class="list-inline-item">Sep 27 2020</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>