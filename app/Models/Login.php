<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\News_fenlei\News_fenlei;
use Illuminate\Pagination\Paginator;
use Session;
class Login{
	//定义随机数，传递给控制器
	public static function val_login(){
		$code=rand(1111,9999);
	    Session::put('code',$code);
	    return $code;
	}
	//验证登录
	public static function jy_login($result){
		     
	       $new_code=$result['code'];//表单过来的验证码
	       $old_code=Session::get('code');//session取出来的
	       if($new_code!=$old_code){
	       	$status="101";//验证码错误
	       	return $status;
	       }
	       //根据用户名查询表单中信息是有存在
	        $userinfo=DB::table('sc_admin')->where('admin',$result['user'])->first();
	        // print_r($userinfo);die;
	        if(!$userinfo){
	       	    $status="102";//	       	   
	        }else{
	       	if($userinfo->pwd == $result['pwd']){  
	       		$status = 103;
	       	}else{
	       		$status = 104;	
	       	}
	       }
	       return $status;
		
	}
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
         	'bt'=>$data['bt'],
         	'fbt'=>$data['fbt'],
         	'text'=>$data['text'],
         	'username'=>$data['username'],
         	'date'=>date('Y-m-d H:i:s')
         );
         // print_r($arr);die;
         $data=DB::table('sc_tefb')->insert($arr);

         if($data){
          $result['list']=$data;
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
        $data=DB::table('sc_tefb')->orderBy('id','desc')->Paginate(10);
        return $data;
    }

    //删除
    public static function delete_one($id){
    	$data=DB::table('sc_tefb')->where('id',$id)->delete();
    	return $data;
    }
   //修改查询
   public static function select_one($id){
   	  //查询表中信息,转化为数组进行渲染
   	  $data=DB::table('sc_tefb')->where('id',$id)->first();
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
    $data=Db::table('sc_tefb')->where('id',$result['id'])->update($array);
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
    $datas=DB::table('sc_tefb')->whereIn('id',$data)->delete();
    return $datas;
   }
    //展示通知详情
    public static function showeds($id){
      $data=DB::table('sc_tefb')->where('id',$id)->first();
      return $data;
    }
}