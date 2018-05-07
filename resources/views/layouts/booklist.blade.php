@extends('layouts.base')
@section('admin-biaogelist')
    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 栏目名称</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">商品列表</a></dl>

        <dl>
            <button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus"> 添加产品</button>
        </dl>


    </div>

    <div class="am-btn-toolbars am-btn-toolbar am-kg am-cf">
        <ul>
            <li>
                <div class="am-btn-group am-btn-group-xs">
                    <select data-am-selected="{btnWidth: 90, btnSize: 'sm', btnStyle: 'default'}">
                        <option value="b">产品分类</option>
                        <option value="o">下架</option>
                    </select>
                </div>
            </li>
            <li>
                <div class="am-btn-group am-btn-group-xs">
                    <select data-am-selected="{btnWidth: 90, btnSize: 'sm', btnStyle: 'default'}">
                        <option value="b">产品分类</option>
                        <option value="o">下架</option>
                    </select>
                </div>
            </li>
            <li style="margin-right: 0;">
                <span class="tubiao am-icon-calendar"></span>
                <input type="text" class="am-form-field am-input-sm am-input-zm  am-icon-calendar" placeholder="开始日期"
                       data-am-datepicker="{theme: 'success',}" readonly/>
            </li>
            <li style="margin-left: -4px;">
                <span class="tubiao am-icon-calendar"></span>
                <input type="text" class="am-form-field am-input-sm am-input-zm  am-icon-calendar" placeholder="开始日期"
                       data-am-datepicker="{theme: 'success',}" readonly/>
            </li>

            <li style="margin-left: -10px;">
                <div class="am-btn-group am-btn-group-xs">
                    <select data-am-selected="{btnWidth: 90, btnSize: 'sm', btnStyle: 'default'}">
                        <option value="b">产品分类</option>
                        <option value="o">下架</option>
                    </select>
                </div>
            </li>
            <li><input type="text" class="am-form-field am-input-sm am-input-xm" placeholder="关键词搜索"/></li>
            <li>
                <button type="button" class="am-btn am-radius am-btn-xs am-btn-success" style="margin-top: -1px;">搜索
                </button>
            </li>
        </ul>
    </div>


    <form class="am-form am-g">
        <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
            <tr class="am-success">
                <th class="table-check"><input type="checkbox"/></th>
                <th class="table-id">ID</th>
                <th class="table-id">书名</th>
                <th class="table-title">出版社</th>
                <th class="table-type">作者</th>
                <th class="table-type">语种</th>
                <th class="table-type">描述</th>
                <th class="table-date am-hide-sm-only">出版日期</th>
                <th class="table-type">图片</th>
                <th width="163px" class="table-set">操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($books as $book)
            <tr>
                <td><input type="checkbox"/></td>
                <td>{{$book->book_id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->publisher}}</td>
                <td>{{$book->author}}</td>
                <td class="am-hide-sm-only">{{$book->language}}</td>
                <td class="am-hide-sm-only">{{$book->desc}}</td>
                <td>{{$book->publish_time}}</td>
                <td>
                    @if(isset($book->img))
                        <img src="{{$book->img}}" width="20px" height="20px">
                    @endif
                </td>
                <td>
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a class="am-btn am-btn-default am-btn-xs am-text-success am-round" title="借阅" href="/loan/{{$book->book_id}}"><span class="am-icon-search"></span> </a>
                            <a class="am-btn am-btn-default am-btn-xs am-text-secondary am-round" href="/editbook/{{$book->book_id}}" title="编辑"><span
                                        class="am-icon-pencil-square-o"></span></a>
                            <a class="am-btn am-btn-default am-btn-xs am-text-danger am-round" href="/deletebook/{{$book->book_id}}" title="删除"><span
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