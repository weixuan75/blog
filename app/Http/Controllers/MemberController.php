<?php
/**
 * namespace App\Http\Controllers\MemberController
 * User: weixuan
 * Date: 2018/1/31
 * Time: 18:14
 * Copyright © ENUCP Inc.All rights reserved.
 */

namespace App\Http\Controllers;


use App\Member;

class MemberController extends Controller
{
    public function info(){
        return "member-info";
    }
    //别名 member-info
    public function info1(){
        return route('member-info');
    }
    //参数绑定 member-info
    public function info2($id){
        return route('member-info')." id = ".$id;
    }
    //视图
    public function info3(){
        return view('member-info');
    }

    //默认模板
    public function info4(){
        return view('info');
    }
    //指定文件夹下的模板
    public function info5(){
        return view('member.info');
    }
    //给模板传参数
    public function info6(){
        return view('member.info2',[
            'name'=>'weixuan'
        ]);
    }

    //模型的调用
    public function model(){
        return Member::getMember();
    }
}