@extends('layouts.base')
@section('admin-biaogelist')
    <div class="admin-index">
        <dl data-am-scrollspy="{animation: 'slide-right', delay: 100}">
            <dt class="qs"><i class="am-icon-users"></i></dt>
            <dd>{{$count[0]}}</dd>
            <dd class="f12">用户数量</dd>
        </dl>
        <dl data-am-scrollspy="{animation: 'slide-right', delay: 300}">
            <dt class="cs"><i class="am-icon-area-chart"></i></dt>
            <dd>{{$count[1]}}</dd>
            <dd class="f12">书籍总数</dd>
        </dl>
        <dl data-am-scrollspy="{animation: 'slide-right', delay: 600}">
            <dt class="hs"><i class="am-icon-shopping-cart"></i></dt>
            <dd>{{$count[2]}}</dd>
            <dd class="f12">借出数量</dd>
        </dl>
        <dl data-am-scrollspy="{animation: 'slide-right', delay: 900}">
            <dt class="ls"><i class="am-icon-cny"></i></dt>
            <dd>{{$count[3]}}</dd>
            <dd class="f12">新书收入</dd>
        </dl>
    </div>
    <div class="admin-biaoge">
        <div class="xinxitj">信息概况</div>
        <table class="am-table">
            <thead>
            <tr>
                <th>全部用户</th>
                <th>今日活跃</th>
                <th>今日新增</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$count[0]}}</td>
                <td>{{$users[1]}}</td>
                <td>{{$users[0]}}</td>
            </tr>
            </tbody>
        </table>
        <table class="am-table">
            <thead>
            <tr>
                <th>书籍总数量</th>
                <th>实际总数量</th>
                <th>今日新增</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$bookcounts[0]}}</td>
                <td>{{$bookcounts[1]}}</td>
                <td>{{$bookcounts[2]}}</td>
            </tr>
            </tbody>
        </table>
        <table class="am-table">
            <thead>
            <tr>
                <th>借出数量</th>
                <th>借出用户</th>
                <th>今日新增</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$count[2]}}</td>
                <td>{{$loancounts[1]}}</td>
                <td>{{$loancounts[0]}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="shuju">
        <div class="shujuone">
            <dl>
                <dt>用户总量： {{$count[0]}}</dt>
                <dt>活跃人数： {{$users[1]}}</dt>
            </dl>
            <ul>
                <h2>
                    @if($count[0] == 0)
                        0
                    @else
                        {{round($users[1]/$count[0] * 100,2)}}
                    @endif
                    %
                </h2>
                <li>活跃度</li>
            </ul>
        </div>
        <div class="shujutow">
            <dl>
                <dt>借出总数： {{$count[2]}}</dt>
                <dt>今天借出： {{$loancounts[0]}}</dt>
            </dl>
            <ul>
                <h2>
                    @if($count[2] == 0)
                        0
                    @else
                        {{round($loancounts[0] / $count[2] * 100,2)}}
                    @endif
                    %
                </h2>
                <li>借出比例</li>
            </ul>
        </div>
        <div class="slideTxtBox">
            <div class="hd">
                <ul>
                    <li>借出信息</li>
                </ul>
            </div>
            <div class="bd">
                <ul>
                    <table width="100%" class="am-table">
                        <tbody>
                        @for($i = 0;$i < $loans->count();$i++)
                            <tr>
                                <td width="7%" align="center">{{$i}}</td>
                                <td width="83%">用户{{$loans[$i]->name}}进行借书操作</td>
                                <td width="10%" align="center"><a href="#">{{$loans[$i]->num}}本</a></td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </ul>
            </div>
        </div>
        <script type="text/javascript">jQuery(".slideTxtBox").slide();</script>


    </div>

    <div class="foods">
        <ul>版权所有@2015</ul>
        <dl><a href="" title="返回头部" class="am-icon-btn am-icon-arrow-up"></a></dl>


    </div>
@endsection