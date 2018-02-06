<?php
/**
 * namespace ec\models\Student
 * User: weixuan
 * Date: 2018/2/2
 * Time: 10:31
 * Copyright © ENUCP Inc.All rights reserved.
 *
 * @property int $id
 * @property string $name 姓名
 * @property int $age 年龄
 * @property int $sex 性别
 * @property int $create_at 创建时间
 * @property int $update_at 修改时间
 */

namespace App\ec\models;


use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //指定表明
    protected $table = 'student';
    //指定主见
    protected $primaryKey = 'id';
    //时间戳
    //默认情况下，Eloquent期望created_at和updated_at列存在于您的表上。
    //如果您不希望通过Eloquent自动管理这些列，
    //请将$timestamps模型上的属性设置为false
    public $timestamps = false;
    //允许被批量赋值
    protected $fillable = ['name','age','sex'];
    //不允许被批量赋值
    /**
     * 如果想让所有的属性都可以被批量赋值，就把 $guarded 定义为空数组。
     */
//    protected $guarde = ['name','age','sex'];
//    protected $guarde = [];

}