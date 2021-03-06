<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bookcms</title>
    <meta name="description" content="Bookcms">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/assets/css/admin.css">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
</head>
<body>
<!--[if lte IE 9]><p class="browsehappy">升级你的浏览器吧！ <a href="http://se.360.cn/" target="_blank">升级浏览器</a>以获得更好的体验！</p>
<![endif]-->


</head>

<body>
<header class="am-topbar admin-header">
    <div class="am-topbar-brand"><img src="/assets/i/logo.png"></div>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav admin-header-list">

            <li class="am-dropdown tognzhi" data-am-dropdown>
                <button class="am-btn am-btn-primary am-dropdown-toggle am-btn-xs am-radius am-icon-bell-o"
                        data-am-dropdown-toggle> 消息管理<span
                            class="am-badge am-badge-danger am-round">{{session('infonum')}}</span></button>
                <ul class="am-dropdown-content">


                    <li class="am-dropdown-header">所有消息都在这里</li>
                    <li><a href="#">低库存书籍<span
                                    class="am-badge am-badge-danger am-round">{{session('infonum')}}</span></a></li>


                </ul>
            </li>

            <li class="kuanjie">

                <a href="/booklist">书籍管理</a>
                @if(isset(Auth::user()->id))<a href="/loanlist">借阅管理</a>@endif
                @if(isset(Auth::user()->id))<a href="/userlist">用户管理</a>@endif
                @if(isset(Auth::user()->id))<a href="/userinfo">系统设置</a>@endif
            </li>

            <li class="soso">
                <form action="/searchbook" method="post">
                    <p>
                        {{csrf_field()}}
                        <select name="type" data-am-selected="{btnWidth: 70, btnSize: 'sm', btnStyle: 'default'}">
                            <option value="all">全部</option>
                            <option value="havestock">未借完</option>

                        </select>

                    </p>

                    <p class="ycfg"><input type="text" name="search" class="am-form-field am-input-sm"
                                           placeholder="搜索书籍"/></p>
                    <p>
                        <button class="am-btn am-btn-xs am-btn-default am-xiao"
                                onclick="document:search_form.submit();"><i class="am-icon-search"></i></button>
                    </p>
                </form>
            </li>


            <li class="am-hide-sm-only" style="float: right;"><a href="javascript:;" id="admin-fullscreen"><span
                            class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">

    <div class="nav-navicon admin-main admin-sidebar">

        <div class="sideMenu am-icon-dashboard" style="color:#aeb2b7; margin: 10px 0 0 0;">
            @if(Auth::user())
                欢迎你：{{Auth::user()->name}}
                <a type="button" class="am-btn am-btn-default am-radius am-btn-xs" href="/logout">退出</a>
            @else
                &nbsp;&nbsp;&nbsp;
                <a type="button" class="am-btn am-btn-default am-radius am-btn-xs" href="/login">登录</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a type="button" class="am-btn am-btn-default am-radius am-btn-xs" href="/register">注册</a>
            @endif
        </div>
        <div class="sideMenu">
            <h3 class="am-icon-flag"><em></em> <a href="#">书籍管理</a></h3>
            <ul>
                <li><a href="/booklist">书籍列表</a></li>
                @if(isset(Auth::user()->id))
                    @if(Auth::user()->id < 2)
                        <li class="func" dataType='html' dataLink='msn.htm' iconImg='images/msn.gif'><a href="/addbook">添加书籍</a>
                        </li>
                    @endif
                @endif
            </ul>
            <h3 class="am-icon-cart-plus"><em></em> <a href="#"> 借阅管理</a></h3>
            <ul>
                @if(isset(Auth::user()->id))
                    <li><a href="/loanlist">借还书籍</a></li>
                @endif
            </ul>
            <h3 class="am-icon-users"><em></em> <a href="#">用户管理</a></h3>
            <ul>
                <li><a href="/userlist">用户列表</a></li>
            </ul>
            <h3 class="am-icon-gears"><em></em> <a href="#">系统设置</a></h3>
            <ul>
                @if(isset(Auth::user()->id))
                    <li><a href="/userinfo">个人中心</a></li>
                @endif
            </ul>
        </div>
        <!-- sideMenu End -->

        <script type="text/javascript">
            jQuery(".sideMenu").slide({
                titCell: "h3", //鼠标触发对象
                targetCell: "ul", //与titCell一一对应，第n个titCell控制第n个targetCell的显示隐藏
                effect: "slideDown", //targetCell下拉效果
                delayTime: 300, //效果时间
                triggerTime: 150, //鼠标延迟触发时间（默认150）
                defaultPlay: true,//默认是否执行效果（默认true）
                returnDefault: true //鼠标从.sideMen移走后返回默认状态（默认false）
            });
        </script>


    </div>

    <div class=" admin-content">

        <div class="daohang">
            <ul>
                <li>
                    <button type="button" class="am-btn am-btn-default am-radius am-btn-xs"><a href="/">首页</a></button>
                </li>
                <li>
                    <button type="button" class="am-btn am-btn-default am-radius am-btn-xs"
                            onclick="window.location.href='/booklist'">书籍列表<a
                                class="am-close am-close-spin" data-am-modal-close="">×</a>
                    </button>
                </li>
                <li>
                    @if(isset(Auth::user()->id))
                        <button type="button" class="am-btn am-btn-default am-radius am-btn-xs"
                                onclick="window.location.href='/loanlist'">借还书籍<a
                                    href="javascript: void(0)" class="am-close am-close-spin"
                                    data-am-modal-close="">×</a>
                        </button>
                    @endif
                </li>
                <li>
                    <button type="button" class="am-btn am-btn-default am-radius am-btn-xs"
                            onclick="window.location.href='/userlist'">用户管理<a
                                href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close="">×</a>
                    </button>
                </li>


            </ul>


        </div>


        <div class="admin-biaogelist">


            @yield('admin-biaogelist')


        </div>

    </div>


</div>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/assets/js/polyfill/rem.min.js"></script>
<script src="/assets/js/polyfill/respond.min.js"></script>
<script src="/assets/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/assets/js/amazeui.min.js"></script>
<!--<![endif]-->


</body>
</html>