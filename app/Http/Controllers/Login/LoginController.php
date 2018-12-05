<?php
namespace App\Http\Controllers\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Login;
class LoginController extends Controller{
//超级管理员登录，唯一的登陆者，超级管理员可以添加管理成员
	  public function login(){
	      $result=Login::val_login();    
	      return view('login/login',['code'=>$result]);
	  }
	
	   public function loginInfo(Request $request){ 
        
	      $result=$request->all();
        // print_r($result);die;
	      $data=Login::jy_login($result);
	      print_r($data);
	      
		
	   }
      public function shows(Request $request){

      	if($request->isMethod('post')){
            $data=$request->all();
            
            $result=Login::insert($data);

            if($result){
               $array['list']=$result;
              
            }
             return json_encode($array);
        }else{
      		    return view('login.notity');
            }
     }
      //通知展示列表
      public function select(){
      	 $data=Login::showed();
      	 return view('login.show',['data'=>$data]);
      }	
     //删除通知
     public function delete($id){
     	$data=Login::delete_one($id);
        if($data){
        	return redirect('login/select')->with('messqge',"删除成功");
        }else{
        	return redirect('login/select')->with('messqge',"删除失败");
        }
     }
     //修改查询
     public function update($id){
     	$data=Login::select_one($id);
     	return view('login.update',['data'=>$data]);
     }
     //修改数据
      public function edit(Request $request){
      	$result=$request->all();
     	$data=Login::edit_one($result);
     	
     }
      //设置即点即改的方法
    public function saveUsername(Request $request){
    	// print_r($request);die;
      $data=$request->all();
      $array['inform_fbt']=$data['inform_fbt'];
      $info=DB::table('sc_tefb')->where('id',$data['id'])->update($array);
      if($info){
        echo 1;//修改成功
      }else{
        echo 0;//修改失败
      }
    }
    //批量删除方法
    public function del_all(Request $request){
      $data=$request->all();    
      $info=Login::delkeys($data);
      if($info){
        return redirect('login/shows');
      }else{
        return redirect('logins/shows');
      }
    }
    //点击展示详请
    //通知展示列表
    public function msgs($id){
        $data=Login::showeds($id);
        return view('login.msg',['data'=>$data]);
    }
}