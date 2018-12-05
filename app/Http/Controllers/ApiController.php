<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Api;
class ApiController extends Controller{
//接口控制器


//集团通知接口
public function show(){
	//引入秘钥
    $passwd=Api::passwd();
    // print_r($passwd);die;
    //空的数组，等待输入秘钥与存储在model层的秘钥对比
    $date=request()->all();
    // print_r($date);die;
    // 对比秘钥是否一致
  	if($date['key']==$passwd){
  		//调取model层数据
  	   $info=Api::shows();
  	   	  if ($info){
            $array['list']=$info;
            $array['status']=201;
            $array['msg']='接口请求成功';
       	   }else{
            $array['status']=401;
            $array['msg']='接口请求失败';
       	  }
	        $datas = json_encode($array);
	        return $datas;
  	   }else{
	      $result['status']=208;
	      $result['msg']="秘钥不正确";
	      return $result;
  	 }
	
}
//集团优惠接口
public function select(){
	//引入秘钥
    $passwd=Api::passwd();
    // print_r($passwd);die;
    //空的数组，等待输入秘钥与存储在model层的秘钥对比
    $date=request()->all();
    // print_r($date);die;
    // 对比秘钥是否一致
  	if($date['key']==$passwd){
  		//调取model层数据
  	   $info=Api::selects();
  	   	  if ($info){
            $array['list']=$info;
            $array['status']=201;
            $array['msg']='接口请求成功';
       	   }else{
            $array['status']=401;
            $array['msg']='接口请求失败';
       	  }
	        $datas = json_encode($array);
	        return $datas;
  	   }else{
	      $result['status']=208;
	      $result['msg']="秘钥不正确";
	      return $result;
  	 }
	
}




}
