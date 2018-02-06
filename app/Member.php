<?php
/**
 * namespace App\Member
 * User: weixuan
 * Date: 2018/1/31
 * Time: 18:46
 * Copyright © ENUCP Inc.All rights reserved.
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static function getMember()
    {
        return "namespace App\Member";
    }
}