<?php
/**
 * namespace ${NAMESPACE}\\${NAME}
 * User: weixuan
 * Date: 2018/2/6
 * Time: 21:07
 * Copyright © ENUCP Inc.All rights reserved.
 */
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--
       User: weixuan
       Date: 2018/2/6
       Time: 20:25
       Copyright © ENUCP Inc.All rights reserved.
      -->
</head>
<body>
<div class="container-fluid">
    @section('header')
        <div class="container">
            <h1>大标题</h1>
            <h3>普通测试使用禁止模仿</h3>
        </div>
    @show
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            @section('sidebar')
                <div class="list-group">
                    <a class="list-group-item active" href="{{ route('studentIndex') }}">学生列表</a>
                    <a class="list-group-item" href="{{ route('studentEdit') }}">添加学生</a>
                </div>
            @show
        </div>
        <div class="col-sm-10">
            @yield('content','主要内容')
        </div>
    </div>
</div>
<div class="footer">
    @section('footer')
        @ ENUCP
    @show
</div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
