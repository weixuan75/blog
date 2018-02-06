<?php
/**
 * namespace ${NAMESPACE}\\${NAME}
 * User: weixuan
 * Date: 2018/2/5
 * Time: 12:09
 * Copyright © ENUCP Inc.All rights reserved.
 */
?>
        <!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    @section('header')
    头部
        @show
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            @section('sidebar')
                侧边栏
            @show
        </div>
        <div class="col-sm-10">
            {{-- 名，默认值 --}}
            @yield('content','主要内容')
        </div>
    </div>
</div>
<div class="footer">
    @section('footer')
        底部
    @show
</div>

</body>
</html>