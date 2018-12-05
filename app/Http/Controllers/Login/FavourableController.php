<?php
namespace App\Http\Controllers\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Favourable;
class FavourableController extends Controller{
      //优惠新增
      public function shows(Request $request){
      	if($request->isMethod('post')){
            $data=$request->all();
            $result=Favourable::insert($data);
            if($result){
               $array['list']=$result;
              
            }
             return json_encode($array);
      	}else{
      		return view('Favourable.notity');
      }
     }
      //通知展示列表
      public function select(){
      	 $data=Favourable::showed();
      	 // print_r($data);die;
      	 return view('Favourable.show',['data'=>$data]);
      }	
     //删除通知
     public function delete($id){
     	$data=Favourable::delete_one($id);
        if($data){
        	return redirect('favourable/select')->with('messqge',"删除成功");
        }else{
        	return redirect('favourable/sclect')->with('messqge',"删除失败");
        }
     }
     //修改查询
     public function update($id){
     
     	$data=Favourable::select_one($id);
     	// print_r($data);die;
     	return view('Favourable.update',['data'=>$data]);
     }
     //修改数据
      public function edit(Request $request){
      	$result=$request->all();
     	$data=Favourable::edit_one($result);
     	if($data){
        	return redirect('favourable/select')->with('messqge',"修改成功");
        }else{
        	return redirect('favourable/select')->with('messqge',"修改失败");
        }
     }
      //设置即点即改的方法
    public function saveUsername(Request $request){
    	
      $data=$request->all();
      $array['fbt']=$data['fbt'];
      $info=DB::table('sc_yhhd')->where('id',$data['id'])->update($array);
      // print_r($info);die;
      if($info){
        echo 1;//修改成功
      }else{
        echo 0;//修改失败
      }
    }
    //批量删除方法
    public function del_all(Request $request){
      $data=$request->all();    
      $info=Favourable::delkeys($data);
      if($info){
        return redirect('favourable/shows');
      }else{
        return redirect('favourable/shows');
      }
    }
    //点击标题显示详情
    public function msg($id){
        // print_r($id);die;
         $data=Favourable::showeds($id);
         // print_r($data);die;
         return view('Favourable.msg',['data'=>$data]);
    }
}