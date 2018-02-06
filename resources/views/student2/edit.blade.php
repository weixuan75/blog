<?php
/**
 * namespace ${NAMESPACE}\\${NAME}
 * User: weixuan
 * Date: 2018/2/6
 * Time: 21:18
 * Copyright © ENUCP Inc.All rights reserved.
 */
?>
@extends('student2.layouts')
@section('header')
    @parent
@stop
@section('sidebar')
    @parent
@stop
@section('content')

    @include('student2.message')
    <div class="card">
    <div class="card-header">
        Featured
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                </small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@stop
@section('footer')
@parent
@stop