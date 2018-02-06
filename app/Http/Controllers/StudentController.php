<?php
/**
 * namespace App\Http\Controllers\StudentController
 * User: weixuan
 * Date: 2018/1/31
 * Time: 19:04
 * Copyright © ENUCP Inc.All rights reserved.
 */

namespace App\Http\Controllers;

use App\ec\models\Student;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class StudentController extends Controller
{
    //测试连接
    public function one()
    {
        $students = DB::select(
            'select * from student'
        );
        return Json::encode($students);
    }

    //新增
    public function add()
    {
        $students = DB::insert(
            'insert into student (name,age,sex) values (?, ?,?)',
            ['da', 20, 11]
        );
        return Json::encode($students);
    }

    //更新
    public function update($id)
    {
        $students = DB::update(
            'update student set name = ? where id = ?',
            ['daxin', $id]
        );
        return Json::encode($students);
    }

    //删除
    public function delete($id)
    {
        $students = DB::delete(
            'delete from student where id = ?',
            [$id]
        );
        return Json::encode($students);
    }


    //新增
    public function tableAdd()
    {
        $students = DB::table('student')->insert([
            'name' => 'da',
            'age' => 20,
            'sex' => 11
        ]);
        return Json::encode($students);
    }

    //新增获取ID
    public function tableInsertGetId()
    {
        $students = DB::table('student')->insertGetId([
            'name' => 'tableInsertGetId',
            'age' => 20,
            'sex' => 11
        ]);
        return Json::encode($students);
    }

    //新增多条数据
    public function tableInsertAny()
    {
        $students = DB::table('student')->insert([
            [
                'name' => 'any',
                'age' => 20,
                'sex' => 11
            ],
            [
                'name' => 'any2',
                'age' => 20,
                'sex' => 11
            ],
            [
                'name' => 'any3',
                'age' => 20,
                'sex' => 11
            ],
            [
                'name' => 'any4',
                'age' => 20,
                'sex' => 11
            ]
        ]);
        return Json::encode($students);
    }

    //更新数据
    public function tableUpdate()
    {
        $students = DB::table('student')->where("id", 5)->update([
            'name' => 'tableUpdate',
            'age' => 19,
            'sex' => 10
        ]);
        return Json::encode($students);
    }

    //递减
    public function tableDecrement()
    {
        $age = DB::table('student')->decrement("age", 5);
        $sex = DB::table('student')->decrement("sex");
        return Json::encode([$age, $sex]);
    }

    //删除
    public function tableDelete($id)
    {
//        $students = DB::table('student')->where("id",$id)->delete();
        $students = DB::table('student')->where("id", ">=", $id)->delete();
        return Json::encode($students);
    }

    //整表删除
    public function tableTruncate()
    {
        $students = DB::table('student')->truncate();
        return Json::encode($students);
    }

    //查询数据 所有 DB::table('users')->get();
    public function tableGet()
    {
        $students = DB::table('student')->get();
        dd($students);
    }

    //查询数据 单行/列 DB::table('users')->where('name', 'John')->first();
    public function tableFirst()
    {
        $students = DB::table('student')
            ->where("id", "=", 3)//查询条件
            ->orderBy("id", "desc")//查询排序
            ->first();//获取第一条
        return Json::encode($students);
    }

    //查询数据 单行/列 DB::table(表名)->where(字段名, 值)->value(字段名);
    public function tableValue()
    {
        $students = DB::table('student')
            ->where("id", "=", 3)
            ->value("name");
        return Json::encode($students);
    }


    //查询数据 列值列表 DB::table(表名)->pluck(字段名,[字段名...]);
    public function tablePluck()
    {
        $students = DB::table('student')
//            ->pluck("id");
            ->pluck("id");//指定一个自定义键列
        return Json::encode($students);
    }

    //查询数据 列值列表 DB::table(表名)->pluck(字段名,[字段名...]);
    public function tableLists()
    {
        $students = DB::table('student')
            ->pluck("id", "name");//指定一个自定义键列：name是键名id是键值
        return Json::encode($students);
    }

    //查询数据
    public function tableSelect()
    {
        $students = DB::table('student')
            ->select("id", "name", 'age')//返回指定字段的数据
            ->get();
        return Json::encode($students);
    }


    //查询数据 chunk(数量，处理主体）；每次查询的数量，然后让处理主体循环处理
    public function tableChunk()
    {
        DB::table('student')->orderBy('id')->chunk(2, function ($students) {
//            if (你的条件) {
            echo Json::encode($students);
//            } else {
//                return false;//终止
//            }
        });
    }

    //聚合函数 count，max，min，avg，和sum
    public function tableJh()
    {
        $num = DB::table('student')->count();//总数量
        $max = DB::table('student')->max('id');//最大值
        $min = DB::table('student')->min('id');//最小值
        $avg = DB::table('student')->avg('id');//平均值
        $sum = DB::table('student')->sum('id');//总和
        return Json::encode([
            'count()' => $num,
            'max(\'id\')' => $max,
            'min(\'id\')' => $min,
            'avg(\'id\')' => $avg,
            'sum(\'id\')' => $sum,
        ]);
    }

    //Eloquent all
    public function modelAll()
    {
//        header('Content-Type: text/html; charset=utf-8');
//        $num = Student::all();
        $num = Student::all();
        return response()->json($num);
    }

    //Eloquent find
    public function modelFind($id)
    {
        $num = Student::find($id);
        dd($num);
    }

    //Eloquent findOrFail 返回异常
    public function modelFindorfail($id)
    {
        $num = Student::findOrFail($id);
        dd($num);
    }

    //Eloquent get
    public function modelGet()
    {
        $num = Student::get();
        dd($num);
    }

    //Eloquent first
    public function modelFirst()
    {
        $num = Student::where('id', '>', '2')
            ->orderBy('age', 'desc')
            ->first();

        dd($num);
    }


    //Eloquent chunk
    public function modelChunk()
    {
        Student::chunk('2', function ($students) {
//            if (你的条件) {
            echo Json::encode($students);
//            } else {
//                return false;//终止
//            }
        });
    }


    //Eloquent chunk
    public function modelJh()
    {
        $count = Student::count();//总数量
        $max = Student::where('id', '>', 2)->max('age');//最大值
        $min = Student::where('id', '>', 2)->min('age');//最小值
        $avg = Student::where('id', '>', 2)->avg('age');//平均值
        $sum = Student::where('id', '>', 2)->sum('age');//总和
        return Json::encode([
            'count()' => $count,
            'max(\'age\')' => $max,
            'min(\'age\')' => $min,
            'avg(\'age\')' => $avg,
            'sum(\'age\')' => $sum,
        ]);
    }

    //Eloquent add
    public function modelAdd()
    {
        $model = new Student();
        $model->name = 'wwwww';
        $model->age = 24;
        $model->sex = 10;
        $bool = $model->save();
        return Json::encode([$model,$bool,$model->id]);
    }

    //Eloquent 批量添加
    public function modelCreate()
    {
        $model = Student::create([
                'name' => 'any',
                'age' => 20,
                'sex' => 11
            ]);
        return Json::encode([$model]);
    }

    //Eloquent 批量添加
    public function modelInsert()
    {
        $model = Student::insert([
                'name' => 'any',
                'age' => 20,
                'sex' => 11
            ]);
        return Json::encode([$model]);
    }


    //Eloquent 批量添加
    public function bladeV()
    {
        //模板中输出PHP变量
        $model1 = '模板中输出PHP变量';
        //数组变量
        $name = 'sean';
        $arr = ['sean','du'];
        return view('student.bladeV',[
            'model1'=>$model1,
            'name'=>$name,
            'arr'=>$arr,
        ]);
    }

    //Eloquent 批量添加
    public function bladeUrl()
    {
        //模板中输出PHP变量
        $model1 = '模板中输出PHP变量';
        //数组变量
        $name = 'sean';
        $arr = ['sean','du'];
        return view('student.bladeV',[
            'model1'=>$model1,
            'name'=>$name,
            'arr'=>$arr,
        ]);
    }


}