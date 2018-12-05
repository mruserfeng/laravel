<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Session; //使用session

class App extends Model{
    public $timestamps=true;
	public function getDateFormat(){
		return time();
	}
	// 文章添加方法
	public static function wenzhangAdd($rel){
		$arr['text_name']=$rel['text_name'];
		$arr['username']=$rel['username'];
		$arr['release_date']=date('Y-m-d H:i:s');
		$arr['release_text']=$rel['release_text'];
		$info = DB::table('sc_tszd')->insert($arr);
		if($info){
			return redirect('wenzhang');
		}
	}
	// 新闻得添加方法
	public static function xinwenAdd($rel){
		$arr['jouli_bt']=$rel['jouli_bt'];
		$arr['jouli_fbt']=$rel['jouli_fbt'];
		$arr['username']=$rel['username'];
		$arr['jouli_text']=$rel['jouli_text'];
		$arr['jouli_date']=date('Y-m-d H:i:s');
		$info = DB::table('sc_news')->insert($arr);
		if($info){
			return redirect('xinwen');
		}
	}
	// 新闻得展示方法
    public static function xinwenshow(){
    	$data = DB::table('sc_news')->paginate(3);
    	return $data;
    }
    // 政策展示的党法
    public static function zhengceshow(){
    	$data = DB::table('sc_zczd')->paginate(3);
    	return $data;
    }
    // 政策制度添加方法
    	public static function zhengceAdd($rel){
		$arr['zc_bt']=$rel['zc_bt'];
		$arr['zc_fbt']=$rel['zc_fbt'];
		$arr['username']=$rel['username'];
		$arr['zc_text']=$rel['zc_text'];
		$arr['zc_date']=date('Y-m-d H:i:s');
		$info = DB::table('sc_zczd')->insert($arr);
		if($info){
			return redirect('xinwen');
		}
	}
	// 意向学生添加方式
	public static function studentAdd($rel){
		$arr['username']=$rel['username'];
		$arr['card']=$rel['card'];
		$arr['education']=$rel['education'];
		$arr['tel']=$rel['tel'];
		$arr['sex']=$rel['sex'];
		$arr['date']=date('Y-m-d H:i:s');
		// print_r($arr);die;
		$info = DB::table('sc_yxs')->insert($arr);
		if($info){
			return redirect('student');
		}else{
			return redirect('studentinsert');
		}
	}
	// 新闻修改
    public static function wenxieUp($rel){
    	$arr['jouli_bt']=$rel['jouli_bt'];
		$arr['jouli_fbt']=$rel['jouli_fbt'];
		$arr['username']=$rel['username'];
		$arr['jouli_text']=$rel['jouli_text'];
		$arr['jouli_date']=date('Y-m-d H:i:s');
		$data = DB::table('sc_news')->where('id',$rel["id"])->update($arr);
		if($data){
			return redirect('xinwen');
		}else{
			return redirect('xinwenupdate');
		}
    }
	// 文章修改
	public static function wenzhangUp($rel){
		$arr['text_name']=$rel['text_name'];
		$arr['username']=$rel['username'];
		$arr['release_date']=date('Y-m-d H:i:s');
		$arr['release_text']=$rel['release_text'];
		$data = DB::table('sc_tszd')->where('id',$rel["id"])->update($arr);
		if($data){
		return redirect('wenzhang');
		}else{
		return redirect('wenzhangupdate');
		}
	}
	// 政策修改
	public static function zhengceUp($rel){
		$arr['zc_bt']=$rel['zc_bt'];
		$arr['zc_fbt']=$rel['zc_fbt'];
		$arr['username']=$rel['username'];
		$arr['zc_text']=$rel['zc_text'];
		$arr['zc_date']=date('Y-m-d H:i:s');
		$data = DB::table('sc_zczd')->where('id',$rel["id"])->update($arr);
		if($data){
		return redirect('zhengce');
		}else{
		return redirect('zhengceupdate');
		}
	}
	// 意向学生修改
		public static function studentUp($rel){
		$arr['username']=$rel['username'];
		$arr['card']=$rel['card'];
		$arr['education']=$rel['education'];
		$arr['tel']=$rel['tel'];
		$arr['sex']=$rel['sex'];
		$arr['date']=date('Y-m-d H:i:s');
		$data = DB::table('sc_yxs')->where('id',$rel["id"])->update($arr);
		if($data){
		return redirect('student');
		}else{
		return redirect('studentupdate');
		}
	}
}


?>