@extends('layouts.base')
@section('admin-biaogelist')
    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 借还管理</ul>

        <dl class="am-icon-home" style="float: right;">当前位置： 首页 > <a href="#">借阅管理</a></dl>

        {{--<dl>--}}
            {{--<button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> 补充线订单</button>--}}
        {{--</dl>--}}
        <!--这里打开的是新页面-->


    </div>















    <form class="am-form am-g">
        <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
            <tr class="am-success">
                <th class="table-check"><input type="checkbox"/></th>
                <th class="table-id">书名</th>
                <th class="table-title">出版社</th>
                <th class="table-type">作者</th>
                <th class="table-type">数量</th>
                <th class="table-date am-hide-sm-only">借阅日期</th>
                <th width="163px" class="table-set">操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($loans as $loan)
                    <tr>
                        <td><input type="checkbox"/></td>
                        <td>{{$loan->name}}</td>
                        <td>{{$loan->publisher}}</td>
                        <td>{{$loan->author}}</td>
                        <td>{{$loan->num}}</td>
                        <td class="am-hide-sm-only">{{$loan->created_at}}</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <script>
                                    function unloan(id,time) {
                                        if(confirm('是否还书'))
                                            window.location.href = '/unloan/' + id + '/' + time;
                                        return;
                                    }
                                </script>
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-xs am-text-danger am-round" onclick="unloan({{$loan->book_id}},{{strtotime($loan->created_at)}})" title="还书"><span
                                                class="am-icon-trash-o"></span></a>
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