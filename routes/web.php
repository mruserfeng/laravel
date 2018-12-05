<?php

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
//展示列表路由
Route::any('seven/select',['uses'=>'Seven\SevenController@select']);
//查询表中信息
Route::any('seven/show',['uses'=>'Seven\SevenController@show']);
//查询表中信息,转化为数组进行渲染
Route::any('seven/shows',['uses'=>'Seven\SevenController@shows']);
//insert
Route::any('seven/insert',['uses'=>'Seven\SevenController@insert']);

/*
 *@Yifeng_888
 *APP登录模块
 */
//随机数传递html login/login
Route::any('login/login',['uses'=>'Login\LoginController@login']);
//随机数传递html 
Route::any('login/loginInfo',['uses'=>'Login\LoginController@loginInfo']);
/*
 *@Yifeng_888
 *APP集团通知发布表
 */
//登录成功跳转测试路由login/shows
Route::any('login/shows',['uses'=>'Login\LoginController@shows']);
//展示通知页面login/select
Route::any('login/select',['uses'=>'Login\LoginController@select']);
//修改查询login/update
Route::any('login/update/{id}',['uses'=>'Login\LoginController@update']);
//修改通知
Route::any('login/edit',['uses'=>'Login\LoginController@edit']);
//删除
Route::any('login/dalete/{id}',['uses'=>'Login\LoginController@delete']);
//即点即改
Route::any('saveUsernamed',['uses'=>'Login\LoginController@saveUsername']);
//批量删除del_all
Route::any('login/del_all',['uses'=>'Login\LoginController@del_all']);
//通知详情
Route::any('login/msg/{id}',['uses'=>'Login\LoginController@msgs']);
/*
 *@Yifeng_888
 *APP集团优惠活动表
 */
//	favourable
Route::any('favourable/shows',['uses'=>'Login\FavourableController@shows']);
//展示通知页面login/select
Route::any('favourable/select',['uses'=>'Login\FavourableController@select']);
//修改查询login/update
Route::any('favourable/update/{id}',['uses'=>'Login\FavourableController@update']);
//修改通知
Route::any('favourable/edit',['uses'=>'Login\FavourableController@edit']);
//删除
Route::any('favourable/dalete/{id}',['uses'=>'Login\FavourableController@delete']);
//即点即改
Route::any('favourable/saveUsernamed',['uses'=>'Login\FavourableController@saveUsername']);
//批量删除del_all
Route::any('favourable/del_all',['uses'=>'Login\FavourableController@del_all']);
//优惠详情
Route::any('favourable/msg/{id}',['uses'=>'Login\FavourableController@msg']);

// 展示页面
Route::any('index',array('uses'=>"app\AppController@index"));
Route::any('indexs',array('uses'=>"app\AppController@indexs"));



// 文章展示
Route::any('wenzhang',array('uses'=>"app\AppController@wenzhang"));
// 文章添加
Route::any('wenzhanginsert',array('uses'=>"app\AppController@wenzhanginsert"));
// 文章删除
Route::any('wenzhangdel',array('uses'=>"app\AppController@wenzhangdel"));
// 文章批量删除
Route::any('wenzhangdeletes',array('uses'=>'app\AppController@wenzhangdeletes'));
// 文章修改
Route::any('wenzhangupdate',array('uses'=>'app\AppController@wenzhangupdate'));





// 新闻展示
Route::any('xinwen',array('uses'=>"app\AppController@xinwen"));
// 新闻添加
Route::any('xinweninsert',array('uses'=>"app\AppController@xinweninsert"));
// 新闻删除
Route::any('xinwendel',array('uses'=>"app\AppController@xinwendel"));
// 新闻批量删除
Route::any('xinwendeletes',array('uses'=>"app\AppController@xinwendeletes"));
// 新闻修改
Route::any('xinwenupdate',array('uses'=>"app\AppController@xinwenupdate"));




// 政策展示
Route::any('zhengce',array('uses'=>"app\AppController@zhengce"));

// 政策添加
Route::any('zhengceinsert',array('uses'=>"app\AppController@zhengceinsert"));
// 政策删除
Route::any('zhengcedel',array('uses'=>"app\AppController@zhengcedel"));
// 政策批量删除
Route::any('zhengcedeletes',array('uses'=>"app\AppController@zhengcedeletes"));
// 政策制度修改
Route::any('zhengceupdate',array('uses'=>"app\AppController@zhengceupdate"));




// 意向学生展示
Route::any('student',array('uses'=>"app\AppController@student"));
// 意向学生添加
Route::any('studentinsert',array('uses'=>"app\AppController@studentinsert"));
// 意向学生展示
Route::any('studentdel',array('uses'=>"app\AppController@studentdel"));
// 意向学生批删
Route::any('studentdeletes',array('uses'=>"app\AppController@studentdeletes"));
// 意向学生修改
Route::any('studenteupdate',array('uses'=>"app\AppController@studenteupdate"));



// 接口
// 投诉文章接口
Route::any('wenzhangapi',array('uses'=>"api\ApiController@wenzhangapi"));
// 集团新闻接口
Route::any('xinwenapi',array('uses'=>"api\ApiController@xinwenapi"));
// 预留学生接口
Route::any('studentapi',array('uses'=>"api\ApiController@studentapi"));
// 政策制度
Route::any('zhengceapi',array('uses'=>"api\ApiController@zhengceapi"));
/*
 *@Yifeng_888
 *APP集团优惠活动表数据API接口
 */
//APP集团通知表数据接口
Route::any('api/shows',['uses'=>'api\ApiController@show']);
//APP集团优惠活动表数据接口
Route::any('api/select',['uses'=>'api\ApiController@select']);
//通知详情
Route::any('api/msg',['uses'=>'api\ApiController@msg']);
//集团优惠详情
Route::any('api/msgs',['uses'=>'api\ApiController@msgs']);
