<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\News_fenlei\News_fenlei;
use Illuminate\Pagination\Paginator;
use Session;
class Api{
   //调用接口数据
   public static function passwd(){
      $key='c56d0e9a7ccec67b4ea131655038d604';
      return $key;
   }
   //调用集团通知数据
   public static function shows(){
   	  $data=DB::table('sc_tefb')->orderBy('id','desc')->Paginate(10);
        // return $data;
      if($data){
      	$array['list']=$data;
      	$array['status']=200;
      	$array['msg']="集团通知数据调用成功";
      	return $array;
      }else{
      	$array['status']=400;
      	$array['msg']="集团通知数据调用失败";
      	return $array;
      }

   }
   //调用集团优惠活动数据
   public static function selects(){
   	  $data=DB::table('sc_yhhd')->orderBy('id','desc')->Paginate(10);
      if($data){
      	$array['list']=$data;
      	$array['status']=200;
      	$array['msg']="集团通知数据调用成功";
      	return $array;
      }else{
      	$array['status']=400;
      	$array['msg']="集团通知数据调用失败";
      	return $array;
      }

   }
   //优惠详情model层
 public static function selectds($data){
   $datas=DB::table('sc_yhhd')->where('id',$data['id'])->first();
   print_r($data);
   if($datas){
         $array['list']=$datas;
         $array['status']=200;
         $array['msg']="集团通知数据调用成功";
         return $array;
      }else{
         $array['status']=400;
         $array['msg']="集团通知数据调用失败";
         return $array;
      }

  }
   //通知详情
 public static function showeds($data){
   $datas=DB::table('sc_tefb')->where('id',$data['id'])->first();
   // print_r($datas);
   if($datas){
         $array['list']=$datas;
         $array['status']=200;
         $array['msg']="集团通知数据调用成功";
         return $array;
      }else{
         $array['status']=400;
         $array['msg']="集团通知数据调用失败";
         return $array;
      }

  }
}