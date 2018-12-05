<?php 
namespace App\Http\Controllers\app;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\App;
   header('Content-type: application/json');
class AppController extends Controller{
 
	public function index(){
		return view("app.index");
	}
	public function indexs(){
		return view('app.indexs');
	}
     // 添加
	public function wenzhanginsert(Request $request){
		// 判断页面
		if($request->isMethod('post')){
            $data = $request->all();
            $info = App::wenzhangAdd($data);
            return $info;
		}else{
			return view('app.wenzhanginsert');
		}
	}
	// 分页展示
	public function wenzhang(){
		$data = DB::table('sc_tszd')->paginate(10);
		return view('app/wenzhang',['data'=>$data]);
	}
	// 删除
	public function wenzhangdel(){
		$id = $_GET['id'];
		$data = DB::table('sc_tszd')->where('id',$id)->delete();
		if($data){
            return redirect('wenzhang');
		}else{
            return redirect('wenzhang');
		}
	}
	    // 批量删除
   public function wenzhangdeletes(){

        $id = $_GET['id'];
//        dump($_GET);die;
        $str = explode(",",$id);
        foreach($str as $v){
            $del=DB::table('sc_tszd')->where('id',"=","$v")->delete();
        }
        if ($del){
            return redirect("wenzhang");
        }else{
            return redirect("wenzhang");
        }
    }
    // 新闻添加
	public function xinweninsert(Request $request){
		if($request->isMethod('post')){
            $data = $request->all();
            $info = App::xinwenAdd($data);
            return $info;
		}else{
			return view('app.xinweninsert');
		}
	}
	// 新闻展示
	public function xinwen(){
		$data = App::xinwenshow();
		return view('app.xinwen',['data'=>$data]);
	}
	// 新闻删除
	public function xinwendel(){
		$id = $_GET['id'];
		$data = DB::table('sc_news')->where('id',$id)->delete();
		if($data){
			return redirect('xinwen');
		}else{
			return redirect('xinwen');
		}
	}
  // 新闻批量删除
   public function xinwendeletes(){

        $id = $_GET['id'];
//        dump($_GET);die;
        $str = explode(",",$id);
        foreach($str as $v){
            $del=DB::table('sc_news')->where('id',"=","$v")->delete();
        }
        if ($del){
            return redirect("xinwen");
        }else{
            return redirect("xinwen");
        }
    }

    // 政策展示
    public function zhengce(){
    	$data = App::zhengceshow();
    	return view('app.zhengce',['data'=>$data]);
    }
    // 政策制度批量删除
    public function zhengcedeletes(){

        $id = $_GET['id'];
//        dump($_GET);die;
        $str = explode(",",$id);
        foreach($str as $v){
            $del=DB::table('sc_zczd')->where('id',"=","$v")->delete();
        }
        if ($del){
            return redirect("zhengce");
        }else{
            return redirect("zhengce");
        }
    }
    // 政策制度添加方法
    public function zhengceinsert(Request $request){
    	if($request->isMethod('post')){
            $info = $request->all();
            $data = App::zhengceAdd($info);
            if($data){
            	return redirect('zhengce');
            }else{
            	return redirect('zhengceinsert');
            }
    	}else{
    		return view('app.zhengceinsert');
    	}
    }
    // 政策删除
    public function zhengcedel(){
    	$id = $_GET['id'];
    	$data = DB::table('sc_zczd')->where('id',$id)->delete();
    	if($data){
    		return redirect('zhengce');
    	}else{
    		return redirect('zhengce');
    	}
    }
    // 意向学生展示页面
    public function student(){
    	$data = DB::table('sc_yxs')->paginate(10);
        // print_r($data);die;
    	return view('app.student',['data'=>$data]);
    }
    // 意向学生添加
    public function studentinsert(Request $request){
    	if($request->isMethod('post')){
            $info = $request->all();
            $data = App::studentAdd($info);
            return $data;
    	}else{
    		return view('app.studentinsert');
    	}
    }
    // 意向学生删除
    public function studentdel(){
    	$id = $_GET['id'];
    	$data = DB::table('sc_yxs')->where('id',$id)->delete();
    	if($data){
    		return redirect('student');
    	}else{
    		return redirect('student');
    	}
    }
    // 意向学生批量删除
    public function studentdeletes(){
        $id = $_GET['id'];
//        dump($_GET);die;
        $str = explode(",",$id);
        foreach($str as $v){
            $del=DB::table('sc_zczd')->where('id',"=","$v")->delete();
        }
        if ($del){
            return redirect("student");
        }else{
            return redirect("student");
        }
    }
    // 新闻修改
    public function xinwenupdate(Request $request){
    	if($request->isMethod('post')){

            $data = $request->all();
            $info = App::wenxieUp($data);
            return $info;
    	}else{
    		$id = $_GET['id'];
    		$data = DB::table('sc_news')->where('id',$id)->first();
    		return view('app.xinwenupdate',['data'=>$data]);
    	}
    }
    // 文章修改
    public function wenzhangupdate(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$info = App::wenzhangUp($data);
    		return $info;
    	}else{
    		$id = $_GET['id'];
    		$data = DB::table('sc_tszd')->where('id',$id)->first();
    		return view('app.wenzhangupdate',['data'=>$data]);
    	}
    }
    // 政策制度修改
    public function zhengceupdate(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$info = App::zhengceUp($data);
    		return $info;
    	}else{
    		$id = $_GET['id'];
    		$data = DB::table('sc_zczd')->where('id',$id)->first();
    		return view('app.zhengceupdate',['data'=>$data]);
    	}
    }
    //学生修改
        public function studenteupdate(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$info = App::studentUp($data);
    		return $info;
    	}else{
    		$id = $_GET['id'];
    		$data = DB::table('sc_yxs')->where('id',$id)->first();
    		return view('app.studentupdate',['data'=>$data]);
    	}
    }
}


 ?>