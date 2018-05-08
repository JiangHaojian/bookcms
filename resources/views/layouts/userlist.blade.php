@extends('layouts.base')
@section('admin-biaogelist')
    <div class="listbiaoti am-cf">
        <ul class="am-icon-users"> 用户管理</ul>

        <dl class="am-icon-home" style="float: right;">当前位置： 首页 > <a href="#">用户列表</a></dl>

    {{--<dl>--}}
    {{--<button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> 手动添加会员</button>--}}
    {{--</dl>--}}
    <!--这里打开的是新页面-->


    </div>















    <form class="am-form am-g">
        <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
            <tr class="am-success">
                <th class="table-id">用户ID</th>
                <th class="table-title">用户名称</th>
                <th class="table-type">用户等级</th>
                <th class="table-author am-hide-sm-only">用户邮箱</th>
                <th class="table-author am-hide-sm-only">注册日期</th>
                <th width="130px" class="table-set">操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td class="am-hide-sm-only">
                        @if($user->type == 0)
                            超管
                        @elseif($user->type == 1)
                            管理员
                        @else
                            用户
                        @endif
                    </td>
                    <td class="am-hide-sm-only">{{$user->email}}</td>
                    <td class="am-hide-sm-only">{{$user->created_at}}</td>
                    <td>
                        <div class="am-btn-toolbar">
                            <div class="am-btn-group am-btn-group-xs">
                                @if(isset(Auth::user()->type))
                                    @if(Auth::user()->type == 0)
                                        @if($user->type != 0)
                                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary am-round"
                                               data-am-modal="{target: '#my-popups'}" title="提升权限"
                                               href="/uplevel/{{$user->id}}"><span
                                                        class="am-icon-pencil-square-o"></span></a>
                                            @if(Auth::user()->type == 0)
                                                <a class="am-btn am-btn-default am-btn-xs am-text-danger am-round"
                                                   title="删除权限" href="/downlevel/{{$user->id}}">
                                                    <span class="am-icon-trash-o"></span>
                                                </a>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 删除</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 上架</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 下架</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 移动</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 移动</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
        </div>

        <ul class="am-pagination am-fr">
            <li class="am-disabled"><a href="#">«</a></li>
            <li class="am-active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">»</a></li>
        </ul>


        <hr/>
        <p>注：.....</p>
    </form>




    <div class="foods">
        <ul>
            版权所有@2015
        </ul>
        <dl>
            <a href="" title="返回头部" class="am-icon-btn am-icon-arrow-up"></a>
        </dl>
    </div>
@endsection