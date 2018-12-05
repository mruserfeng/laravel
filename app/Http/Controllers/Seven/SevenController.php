<?php
namespace App\Http\Controllers\Seven;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SevenController extends Controller{
	//查询信息，列表展示
	public function select(){
		return view('seven/ManageSystem');
	}
   //查询渲染数据
   public function show(){
   	$data=DB::table('nxl')->get();
   	if($data){
   		$info['status']=1;
   		$info['msg']="查询成功";
   	}else{
   		$info['status']=0;
   		$info['msg']="查询失败";
   	}
   	$infos=json_encode($data);
    print_r($infos);
   }
   //json转换成数组，并渲染数据
   public function shows(){
   	$data=file_get_contents("http://www.seven.com/seven/show");
   	$info=json_decode($data,true);
   	return view('seven/Manage_diansh',['info'=>$info]);
   }
   //新增
   public function insert(Request $request){
   	  $data=$request->all();
   	  // print_r($data);die;
   	  $array=array(
   	  	'create_time'=>$data['YYYY'].$data['MM'].$data['DD'],
   	  	'address'=>$data['add_crty'],
        'add_msg'=>$data['add_msg'],
        'people'=>$data['people'],
        'sey_people'=>$data['sey_people'],
        'gf'=>$data['gf'],
        'gf_msg'=>$data['gf_msg']
   	);
   	  $info=DB::table('nxl_insert')->insert($array);
   	  print_r($info);
   }

}