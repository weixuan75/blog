<?php
/**
 * namespace ${NAMESPACE}\\${NAME}
 * User: weixuan
 * Date: 2018/2/6
 * Time: 21:20
 * Copyright © ENUCP Inc.All rights reserved.
 */ ?>
@extends('student2.layouts')
@section('header')
    @parent
@stop
@section('sidebar')
    @parent
@stop
@section('content')

    <div class="alert alert-primary" role="alert">
        This is a primary alert—check it out!
    </div>
    <div class="alert alert-secondary" role="alert">
        This is a secondary alert—check it out!
    </div>
    <div class="alert alert-success" role="alert">
        This is a success alert—check it out!
    </div>
    <div class="alert alert-danger" role="alert">
        This is a danger alert—check it out!
    </div>
    <div class="alert alert-warning" role="alert">
        This is a warning alert—check it out!
    </div>
    <div class="alert alert-info" role="alert">
        This is a info alert—check it out!
    </div>
    <div class="alert alert-light" role="alert">
        This is a light alert—check it out!
    </div>
    <div class="alert alert-dark" role="alert">
        This is a dark alert—check it out!
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">姓名</th>
            <th scope="col">年龄</th>
            <th scope="col">性别</th>
            <th scope="col">添加时间</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->sex}}</td>
                <td>{{$student->create_at}}</td>
                <td>
                    <a href="{{ url('student/show',['id'=>$student->id]) }}">详情</a>
                    <a href="{{ url('student/edit',['id'=>$student->id]) }}">修改</a>
                    <a href="{{ url('student/del',['id'=>$student->id]) }}">修改</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            {{$students->links('vendor.pagination.bootstrap-4')}}
        </ul>
    </nav>
@stop
@section('footer')
    @parent
@stop
