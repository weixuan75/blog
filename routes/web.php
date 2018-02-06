<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//get请求
Route::get("/a", function () {
    return "kaishi";
});
//post请求
/**
 * post提交数据时候显示如下：
 *
 * The page has expired due to inactivity.
 *
 * Please refresh and try again
 *
 * 这是由于在laravel框架中有此要求：任何指向 web 中 POST, PUT 或 DELETE 路由的 HTML 表单请求都应该包含一个 CSRF 令牌，否则，这个请求将会被拒绝。
 *
 * <form method="POST" action="/profile">
 * {{ csrf_field() }}
 * ...
 * </form>
 */
//禁用csrf
//\App\Http\Middleware\VerifyCsrfToken::class,
Route::post("/b", function () {
    return "post";
});

//多请求：响应指定的请求
Route::match(['get', 'post'], "/d", function () {
    return "多请求 match";
});

//响应所有请求
Route::any("/c", function () {
    return "多请求 any";
});


/**
 * 路由参数
 */
//路径中加载参数
Route::get("/a1/{id}", function ($id) {
    return "id = " . $id;
});
//路径中加载参数 赋默认值
Route::get("/a1/{name?}", function ($name = 55) {
    return "name = " . $name;
});
//设置默认值为空
Route::get("/a2/{name?}", function ($name = null) {
    return "name = " . $name;
});

//设置正则表达式校验参数 : 单个字段
Route::get("/a3/{name?}", function ($name = null) {
    return "name = " . $name;
})->where("name", '[A-Za-z]+');

//设置正则表达式校验参数 : 多个字段
Route::get("/a4/{id}/{name?}", function ($id, $name) {
    return "id = " . $id . " name = " . $name;
})->where([
    "id" => '[0-9]+',
    "name" => '[A-Za-z]+'
]);

/**
 * 路由别名:独一无二
 * 为了方便快捷获取指定路由的URL地址
 */
Route::get("/aa1", ['as' => 'center', function () {
    return \route('center');
}]);

/**
 * 路由群组
 */
Route::group(['prefix' => 'member'], function () {
    Route::get("/aaa", ['as' => 'center', function () {
        return \route('center');
    }]);
    Route::post("/bbb", function () {
        return "post";
    });
});

/**
 * 路由视图
 */
Route::get('/view', function () {
    return view('welcome');
});

/**
 * 路由器与控制器关联
 */
//Route::get('member/info','MemberController@info');
//  ||等同于
Route::get('member/info', ['uses' => 'MemberController@info']);

//别名
Route::get('member/info1', [
    'uses' => 'MemberController@info1',
    'as' => 'member-info'
]);

//参数绑定:不能使用别名
Route::get('member/info2/{id}', [
    'uses' => 'MemberController@info2'
])->where([
    "id" => '[0-9]+'
]);

/**
 * 视图
 */
Route::get('member/info3', [
    'uses' => 'MemberController@info3'
]);
//默认模板
Route::get('member/info4', [
    'uses' => 'MemberController@info4'
]);
//指定文件夹下的模板
Route::get('member/info5', [
    'uses' => 'MemberController@info5'
]);

//给模板传参数
Route::get('member/info6', [
    'uses' => 'MemberController@info6'
]);

/**
 * 模型
 * namespace App\Member
 */
//模型的调用

Route::get('member/model', [
    'uses' => 'MemberController@model'
]);
/*
 * 数据库连接
 *
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '姓名',
  `age` tinyint(4) NOT NULL DEFAULT '0' COMMENT '年龄',
  `sex` tinyint(4) NOT NULL DEFAULT '10' COMMENT '性别',
  `create_at` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `update_at` bigint(20) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='学生表';

连接数据库
config/database.php

.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=123456
 */
//测试连接
Route::get('student/one', [
    'uses' => 'StudentController@one'
]);
//新增
Route::get('student/add', [
    'uses' => 'StudentController@add'
]);
//更新
Route::get('student/update/{id}', [
    'uses' => 'StudentController@update'
]);

//删除
Route::get('student/delete/{id}', [
    'uses' => 'StudentController@delete'
]);

/**
 * 查询构造器
 */
Route::group(['prefix' => 'student'], function () {

    //新增
    Route::get('/table/add', [
        'uses' => 'StudentController@tableAdd'
    ]);
    //新增 :获取ID
    Route::get('/table/insertGetId', [
        'uses' => 'StudentController@tableInsertGetId'
    ]);
    //新增多条数据
    Route::get('/table/insertAny', [
        'uses' => 'StudentController@tableInsertAny'
    ]);

    //更新
    Route::get('/table/update', [
        'uses' => 'StudentController@tableUpdate'
    ]);
    //递增：给数据表中指定列的数字统一递增
    /**
     * DB::table('users')->increment('votes');
     * DB::table('users')->increment('votes', 5);
     */
    Route::get('/table/increment', [
        'uses' => 'StudentController@tableIncrement'
    ]);

    //递减
    /**
     * DB::table('users')->decrement('votes');
     * DB::table('users')->decrement('votes', 5);
     */
    Route::get('/table/decrement', [
        'uses' => 'StudentController@tableDecrement'
    ]);

    //删除
    Route::get('/table/delete/{id}', [
        'uses' => 'StudentController@tableDelete'
    ]);
    //整表删除
    Route::get('/table/truncate', [
        'uses' => 'StudentController@tableTruncate'
    ]);
    //查询数据 DB::table('users')->get();
    Route::get('/table/get', [
        'uses' => 'StudentController@tableGet'
    ]);
    //查询数据 单行/列 DB::table('users')->where('name', 'John')->first();
    Route::get('/table/first', [
        'uses' => 'StudentController@tableFirst'
    ]);
    //查询数据 单行/列 DB::table('users')->where('name', 'John')->value('email');
    Route::get('/table/value', [
        'uses' => 'StudentController@tableValue'
    ]);
    //查询数据 列值列表 DB::table('roles')->pluck('title');
    Route::get('/table/pluck', [
        'uses' => 'StudentController@tablePluck'
    ]);

    //查询数据 列值列表 DB::table('roles')->pluck('title');
    Route::get('/table/lists', [
        'uses' => 'StudentController@tableLists'
    ]);

    //查询数据 列值列表 DB::table('roles')->pluck('title');
    Route::get('/table/select', [
        'uses' => 'StudentController@tableSelect'
    ]);

    //查询数据 列值列表 DB::table('roles')->pluck('title');
    Route::get('/table/select', [
        'uses' => 'StudentController@tableSelect'
    ]);

    //查询数据 列值列表 DB::table('roles')->pluck('title');
    Route::get('/table/chunk', [
        'uses' => 'StudentController@tableChunk'
    ]);

    //聚合函数 count，max，min，avg，和sum
    Route::get('/table/jh', [
        'uses' => 'StudentController@tableJh'
    ]);

    Route::group(['prefix' => 'model'], function () {

        //Eloquent all
        Route::get('/all', [
            'uses' => 'StudentController@modelAll'
        ]);
        //Eloquent find
        Route::get('/find/{id}', [
            'uses' => 'StudentController@modelFind'
        ])->where(["id" => '[0-9]+']);
        //Eloquent find
        Route::get('/findOrFail/{id}', [
            'uses' => 'StudentController@modelFindorfail'
        ])->where(["id" => '[0-9]+']);
        //Eloquent get
        Route::get('/get', [
            'uses' => 'StudentController@modelGet'
        ]);
        //Eloquent first
        Route::get('/first', [
            'uses' => 'StudentController@modelFirst'
        ]);
        //Eloquent first
        Route::get('/chunk', [
            'uses' => 'StudentController@modelChunk'
        ]);

        //Eloquent 聚合函数
        Route::get('/jh', [
            'uses' => 'StudentController@modelJh'
        ]);

        //Eloquent 新增
        Route::get('/add', [
            'uses' => 'StudentController@modelAdd'
        ]);
        //Eloquent 批量增加
        Route::get('/create', [
            'uses' => 'StudentController@modelCreate'
        ]);

    });
    //Blade模板引擎

    Route::group(['prefix' => 'blade'], function () {

        //Blade模板引擎
        Route::get('/v', [
            'uses' => 'StudentController@bladeV'
        ]);
        //Blade模板引擎 url
        Route::get('/url', [
            'as' =>'bladeUrl',
            'uses' => 'StudentController@bladeUrl'
        ]);
    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
