<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0" />
		<meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="format-detection" content="telephone=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta content="black" name="apple-mobile-web-app-status-bar-style">
		<link href="{{asset('login')}}/css/bksystem.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('login')}}/skin/black/skin.css" rel="stylesheet" type="text/css" id="skin" />
		<link href="{{asset('login')}}/css/module.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('login')}}/font/iconfont.css" rel="stylesheet" type="text/css" />
		<title>登录</title>
		<script src="{{asset('login')}}/js/jquery-1.9.1.min.js" type="text/javascript"></script>
		<script src="{{asset('login')}}/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="{{asset('login')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="{{asset('login')}}/js/BKframe.js" type="text/javascript"></script>
		<!--[if lt IE 9]>
          <script src="js/html5shiv.js" type="text/javascript"></script>
          <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
        <![endif]-->
	</head>
	<body class="login-layout Reg_log_style" id="loginstyle">
		<div class="logintop">
			<span>后台管理界面平台</span>
			<ul>
				<li>
					<a href="#">返回首页</a>
				</li>
				<li>
					<a href="#">帮助</a>
				</li>
				<li>
					<a href="#">关于</a>
				</li>
			</ul>
		</div>
		<div class="loginbody">
			<div class="login-container">
				<div class="center"> <img src="{{asset('login')}}/images/logo.png" /></div>
				<div class="space-6"></div>
				<div class="position-relative">
					<div id="login-box" class="login-box widget-box no-border visible">
						<div class="login-main">
							<!--皮肤选择-->
						<div class="skin-section">
							<a href="javascript:void(0)" class="skin-btn clickBombbox iconfont icon-pifushezhi" id="skin-btn"></a>
							<div class="Bombbox">
								<ul class="skin-list">
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="black" id="default" style="background-color:#222A2D"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="blue" style="background-color:#438EB9;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="green" style="background-color:#72B63F;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="gray" style="background-color:#067350;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="red" style="background-color:#FF6868;"></a>
									</li>
									<li>
										<a class="colorpick-btn" href="javascript:void(0)" data-val="purple" style="background-color:#6F036B;"></a>
									</li>
								</ul>
							</div>
						</div>
							<div class="clearfix">
								<div class="login_icon"><img src="images/login_img.png" /></div>
								<form class="" style=" width:300px; float:right; margin-right:50px;">
									<h4 class="title_name"><img src="images/login_title.png" /></h4>
									<fieldset>
										<ul>
											<li class="frame_style form_error">
												<label class="user_icon iconfont">&#xe620;</label>
												<input class="user" type="text" data-name="用户名" id="username" placeholder="用户名" />
												</li>
											<li class="frame_style form_error">
												<label class="password_icon iconfont">&#xe625;</label>
												<input class="pwd" type="password" data-name="密码" id="userpwd" placeholder="密码" />
												</li>
											<li class="frame_style form_error">
												<label class="Codes_icon iconfont">&#xe624;</label>
												<input name="" class="code" type="text" data-name="验证码" id="Codes_text" placeholder="验证码" />
												<div id="codes" class="Codes_region" onclick="sendcode()">{{$code}}</div>
											</li>
										</ul>
										<div class="space"></div>
										<div class="clearfix">
											<label class="inline">
                                      <input type="checkbox" class="ace">
                                      <span class="lbl">保存密码</span>
                                  </label>
											<button type="button" onclick="login()" class="login_btn" id="login_btn"> 登&nbsp;陆 </button>
										</div>

										<div class="space-4"></div>
									</fieldset>
								</form>
							</div>
							<div class="social-or-login center">
								<span class="bigger-110">通知</span>
							</div>
							<div class="social-login ">
								为了更好的体验性（兼容移动端），本网站系统不再对IE8（含IE8）以下浏览器支持，请见谅。
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="loginbm">版权所有 2016</div>
	</body>
</html>
<script src="{{asset('login')}}/js/jq.js"></script>
<script type="text/javascript">
	
	/*****************登录模块*************/
	 function sendcode(){
	 	
   	 $.ajax({
   	 	type:'GET',
   	 	url:"{{url('login/login')}}",
   	 	data:{

   	 	},
        success:function(e){
        	 window.location.href="{{url('login/login')}}";
        }

   	 })
   }

  function login(){

  	var user=$(".user").val();
  	var pwd = $(".pwd").val();
  	var code=$(".code").val();
    // alert(user+pwd+code);
  	//传值
  	$.ajax({
  		type:"POST",
  		url:"{{url('login/loginInfo')}}",
  		data:{
  			user:user,
  			pwd:pwd,
  			code:code 			
  		},
  		success:function(e){
  		    alert(e);
  			// if(e==103){
  			// 	alert('登陆成功');
  			// 	window.location.href="{{url('login/shows')}}";
  			// }else{
  			// 	alert('登录失败');
  			// }
  		}
  	})
  }
</script>