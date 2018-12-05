<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\News_fenlei\News_fenlei;
use Illuminate\Pagination\Paginator;
use Session;
class Favourable{
	
    //新增通知
    public static function insert($data){
      if(empty($data['bt'])){
          $result['status']=101;
            $result['msg']="标题不能为空";
            return $result;die;
         }
         if(empty($data['fbt'])){
            $result['status']=102;
            $result['msg']="副标题不能为空";
            return $result;die;
        }
        if(empty($data['text'])){
            $result['status']=103;
            $result['msg']="通知内容不能为空";
            return $result;die;
        }
        if(empty($data['username'])){
            $result['status']=104;
            $result['msg']="发布人不能为空";
            return $result;die;
        }
    	date_default_timezone_set('Asia/shanghai');
         //接受静态页面传输过来的值
         $arr=array(
         	'bt'=>$request['bt'],
         	'fbt'=>$request['fbt'],
         	'text'=>$request['text'],
         	'username'=>$request['username'],
         	'date'=>date('Y-m-d H:i:s')
         );
         $data=DB::table('sc_yhhd')->insert($arr);

         if($data){
        	$result['status']=200;
        	$result['msg']="新增通知成功";
        	return $result;
         }else{
        	$result['status']=401;
        	$result['msg']="新增通知失败";
        	return $result;
         }
        
    }
    //展示通知列表
    public static function showed(){
    	$data=DB::table('sc_yhhd')->orderBy('id','desc')->Paginate(10);
    	return $data;
    }

    //删除
    public static function delete_one($id){
    	$data=DB::table('sc_yhhd')->where('id',$id)->delete();
    	return $data;
    }
   //修改查询
   public static function select_one($id){
   	  //查询表中信息,转化为数组进行渲染
   	  $data=DB::table('sc_yhhd')->where('id',$id)->first();
   	  // print_r($data);die;
      return $data;
   }
   //修改数据
   public static function edit_one($result){
   	//定义时区为上海
   	date_default_timezone_set("Asia/shanghai");
   	//接受数据定义数组
    $array=array(
   	'bt'=>$result['bt'],
   	'fbt'=>$result['fbt'],
   	'text'=>$result['text'],
   	'username'=>$result['username'],
   	'date'=>date('Y-m-d H:i:s')
    );
    $data=Db::table('sc_yhhd')->where('id',$result['id'])->update($array);
    if($data){
        $result['status']=201;
        $result['msg']="修改通知成功";
        return $result;
    }else{
        $result['status']=402;
        $result['msg']="修改通知失败";
        return $result;
    }
   }
   //批量删除model层
   public static function delkeys($data){
    // print_r($data);die;
    $datas=DB::table('sc_yhhd')->whereIn('id',$data)->delete();
    return $datas;
   }
    //展示通知详情
    public static function showeds($id){
      $data=DB::table('sc_yhhd')->where('id',$id)->first();
      return $data;
    }
}