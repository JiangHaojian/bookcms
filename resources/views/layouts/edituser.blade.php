@extends('layouts.base')
@section('admin-biaogelist')
    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 个人中心</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">系统设置</a></dl>


    </div>

    <div class="fbneirong">
        <form class="am-form" action="/saveuser" method="post">
            {{csrf_field()}}
            <div class="am-form-group am-cf">
                <div class="zuo">用户名：</div>
                <div class="you">
                    <input type="text" name="name" class="am-input-sm" id="doc-vld-name" placeholder="请输入用户名" value="{{$user->name}}">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">邮箱：</div>
                <div class="you">
                    <input type="email" name="email" class="am-input-sm" id="doc-vld-name-2" placeholder="请输入邮箱" value="{{$user->email}}">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">原密码：</div>
                <div class="you">
                    <input type="password" name="pwd" class="am-input-sm" id="doc-vld-name-3" placeholder="请输入密码">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">新密码：</div>
                <div class="you">
                    <input type="password" name="newpwd" class="am-input-sm" id="doc-vld-name-4" placeholder="请输入确认密码">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">确认新密码：</div>
                <div class="you">
                    <input type="password" name="cfnewpwd" class="am-input-sm" id="doc-vld-name-4" placeholder="请输入确认密码">
                </div>
            </div>


            <div class="am-form-group am-cf">
                <div class="you" style="margin-left: 11%;">
                    <button type="submit" class="am-btn am-btn-success am-radius">更新并回到首页</button>&nbsp; &raquo; &nbsp;
                </div>
            </div>
        </form>
    </div>



    <div class="foods">
        <ul>
            版权所有@2015
        </ul>
        <dl>
            <a href="" title="返回头部" class="am-icon-btn am-icon-arrow-up"></a>
        </dl>
    </div>

@endsection