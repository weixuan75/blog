<?php
/**
 * User: weixuan
 * Date: 2018/2/5
 * Time: 12:40
 * Copyright © ENUCP Inc.All rights reserved.
 */
?>
@extends('student.layouts')

@section('header')
    @parent
    {{-- @parent：集成父类 --}}
    重写头部
@stop
@section('sidebar')
    sidebar
@stop
@section('content')
    content

    <br>模板中输出PHP变量
    <br>{{$model1}}
    <br>模板中输出PHP代码
    <br>{{ time() }}
    <br>{{ date('Y-m-d H:i:s',time()) }}
    <br>数组操作
    <br>{{
    in_array($name,$arr) ? 1 :0
    }}
    <br>{{var_dump($arr)}}
    <br>{{isset($name) ? $name:'default'}}
    <br>{{$name or 'default'}}
    <br>原样输出
    <br>@{{ $name }}
    <br>模板注释
    {{-- 模板注释 --}}
    <br>引入视图
    <br>@include('student.common1',['msg'=>'错误'])
    <hr>
    <br>流程控制器<br>
    @if ($name == 'sean')
        I`m {{$name}}.
    @elseif($name == 'imooc')
        I`m {{$name}}.
    @else
        who am I?
    @endif
    <br>流程控制器in_array($name,$arr)<br>
    @if (in_array($name,$arr))
        I`m {{$name}}.
    @else
        who am I?
    @endif
    <br>流程控制器 unless：if的相反<br>
    @unless (!in_array($name,$arr))
        I`m {{$name}}.
    @endunless
    <br>流程控制器 for<br>
    @for( $i = 0;$i<10;$i++)
        {{$i}} -
    @endfor

    <br>流程控制器 foreach<br>
    @foreach( $arr as $a)
        {{$a}}
    @endforeach

    <br>模板中的URL：url() action() route()<br>
    <a href="{{ url('url') }}"></a>

@stop
@section('footer')
    footer
@stop