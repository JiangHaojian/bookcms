@extends('layouts.base')
@section('admin-biaogelist')
    <div class="listbiaoti am-cf">
        <ul class="am-icon-flag on"> 编辑书籍</ul>

        <dl class="am-icon-home" style="float: right;"> 当前位置： 首页 > <a href="#">书籍列表</a></dl>


    </div>

    <div class="fbneirong">
        <form class="am-form" action="/updatebook" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="book_id" value="{{$book['book_id']}}">
            <div class="am-form-group am-cf">
                <div class="zuo">书名：</div>
                <div class="you">
                    <input type="text" name="name" class="am-input-sm" id="doc-vld-name" placeholder="请输入书名" value="{{$book['name']}}">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">作者：</div>
                <div class="you">
                    <input type="text" name="author" class="am-input-sm" id="doc-vld-name-2" placeholder="请输入作者" value="{{$book['author']}}">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">出版社：</div>
                <div class="you">
                    <input type="text" name="publisher" class="am-input-sm" id="doc-vld-name-3" placeholder="请输入出版社" value="{{$book['publisher']}}">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">语种：</div>
                <div class="you">
                    <input type="text" name="language" class="am-input-sm" id="doc-vld-name-4" placeholder="请输入语种" value="{{$book['language']}}">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">库存数量：</div>
                <div class="you" style="width: 70px;">
                    <input type="number" name="stock" class="am-input-sm" id="doc-vld-num-1" min="0" placeholder="数量" value="{{$book['stock']}}">
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">图片：</div>
                <img src="{{$book['img']}}" width="50px" height="50px">
                <div class="you" style="height: 45px;">
                    <input type="file" name="img" id="doc-ipt-file-1" accept="image/png, image/jpeg, image/gif, image/jpg">
                    <p class="am-form-help">请选择要上传的图片...</p>
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">出版日期：</div>
                <div class="you" style="width: 200px">
                    <div class="am-input-group am-datepicker-date" data-am-datepicker="{format: 'yyyy-mm-dd'}">
                        <input type="text" name="publish_time" class="am-form-field" style="height: 30px" placeholder="出版日期" readonly value="{{$book['publish_time']}}">
                        <span class="am-input-group-btn am-datepicker-add-on">
                            <button class="am-btn am-btn-default" type="button">
                                <span class="am-icon-calendar"></span>
                            </button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="zuo">描述：</div>
                <div class="you">
                    <textarea name="desc" class="" rows="2" id="doc-ta-1">{{$book['desc']}}</textarea>
                </div>
            </div>

            <div class="am-form-group am-cf">
                <div class="you" style="margin-left: 11%;">
                    <button type="submit" class="am-btn am-btn-success am-radius">添加并回到首页</button>&nbsp; &raquo; &nbsp;
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