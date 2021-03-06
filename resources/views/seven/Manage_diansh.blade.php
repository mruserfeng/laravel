<!doctype html>
<html>
<head>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>农芯乐信息管理系统</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="js/city-picker.data.js"></script>
<script src="js/city-picker.js"></script>
<script src="js/date.js"></script>
<style>
.city-picker-span { width:300px;}
</style>
</head>

<body style="background:#328f46">
<div class="headiv">
	<div class="logotag">
        <a class="logo"><img src="img/logo.png" width="440" height="65"></a>
        <b class="line"></b>
    </div>
    <a class="username">欢迎登录：<i>admin</i></a>
    <span class="btnbox">
    	<a class="update" href="#" title="修改"></a><a class="exit" href="#" title="退出"></a>
    </span>
    <div class="clear" style="height:20px; background:#328f46"></div>
</div>

<div class="messagebox">
	<div class="messageleft">
    	<ul class="Fstage">
        	<li><a href="#"><em class="e1"></em>常用操作<div class="clear"></div></a>
            	<ul class="Tstage" >
                	<li><a href="Manage_welcome.html">欢迎页面</a></li>
                    <li><a href="#">账号页面</a></li>
                    <li><a href="Manage_statistics.html">县域统计</a></li>
                </ul>
            </li>
            <li><a href="#"><em class="e2"></em>账号管理<div class="clear"></div></a>
            	<ul class="Tstage">
                	<li><a href="Manage_account.html">账户信息</a></li>
                    <li><a href="Manage_safe.html">账户安全</a></li>
                </ul>
            </li>
            <li><a href="#"><em class="e3"></em>县域统计<div class="clear"></div></a>
            	<ul class="Tstage">
                	<li><a href="Manage_jiaoyi.html">县域交易额信息</a></li>
                    <li><a href="Manage_tiyan.html">体验店信息</a></li>
                    <li><a href="Manage_pinkun.html">贫困户信息</a></li>
                    <li><a href="Manage_diansh.html">电商培训</a></li>
                    <li><a href="Manage_wuliu.html">物流车辆</a></li>
                </ul>
            </li>
           
        </ul>
    </div>
    <div class="messageright">
    	<div class="formpage">
        	<div class="clear" style="height:20px"></div>
        	<h2>电商培训
            	<a class="greenbtn add" onclick="callback()" href="#">新增</a>
            </h2>
            <div class="clear" style="height:30px"></div>
          	
            <span class="information">
            	<div class="clear" style="height:10px"></div>
            	
                <form class="datable">
                    <table width="100%" border="1" cellpadding="0" cellspacing="0">
                    	<tr>
                            <th width="10%">培训时间</th>
                            <th width="40%">培训地点</th>
                            <th width="10%">培训人数</th>
                            <th width="20%">主讲人</th>
                            <th width="20%">有无政府人员参与</th>
                            
                        </tr>
                        @foreach($info as $v )
                        <tr>
                        	<td>{{$v['create_time']}}</td>
                            <td>{{$v['adress']}}</td>
                            <td>{{$v['people']}}</td>
                            <td>{{$v['sey_people']}}</td>
                            <td>{{$v['gf']}}</td>
                        </tr>
                        @endforeach
                    </table>
                </form>
                <div class="clear"></div>
            </span>
            <div class="clear" style="height:50px"></div>
           
            
        </div>
    </div>
    <div class="clearh" style="height:0"></div>
</div>
<!--弹出新增层-->
<div class="popbox" style="width:900px">
	<h2>新增电商培训信息</h2>
    <form action="{{url('seven/insert')}}" style="width:800px">
    	<div class="clear" style="height:50px;"></div>
    	<table cellpadding="0"  cellspacing="0" width="100%">
        	<tr>
            	<td width="10%">时间</td>
                <td width="70%">
                <select class="smsel" name="YYYY" onChange="YYYYDD(this.value)">
                    <option value="">请选择 年</option>
                     <option value="2018年">2018</option>
                </select>
                <select class="smsel" name="MM" onChange="MMDD(this.value)">
                    <option value="">选择 月</option>
                     <option value="9月">9月</option>
                </select>
                <select class="smsel" name="DD">
                    <option value="">选择 日</option>
                     <option value="30日">30日</option>
                </select>
                </td>
                <td width="20%"><p class="tip">*此处不能为空</p></td>
            </tr>
            <tr>
            	<td>培训地点</td>
                <td class="address" name="address" style=" line-height:40px">
                    <input id="city-picker3"  name="add_crty"  type="text" class="addr" readonly data-toggle="city-picker"/>
                    <input class="smput"  onFocus="this.value=''" onBlur="this.style='color:#000'" name="add_msg" value="具体地址" type="text"/>
                </td>
                <td><p class="wrrong">*此处不能为空</p></td>
            </tr>
            <tr>
            	<td>培训人数</td>
                <td><input class="textput" name="people" type="text"/></td>
                <td><p class="wrrong">*此处不能为空</p></td>
            </tr>
            <tr>
            	<td>主讲人</td>
                <td><input class="textput" name="sey_people" type="text"/></td>
                <td><p class="wrrong">*此处不能为空</p></td>
            </tr>
            <tr>
            	<td>有无政府人员参与</td>
                <td>
                    <label>无<input type="radio" name="gf" value="无"/></label>
                    <label>有<input type="radio" name="gf" value="有"/></label>
                    <input class="smput nofl" name="gf_msg" type="text" onFocus="this.value=''" onBlur="this.style='color:#000'" placeholder="如有政府人员参与请在此具体输入" />
                </td>
                <td><p class="wrrong">*此处不能为空</p></td>
            </tr>
            
            <tr>
            	<td></td>
                <td colspan="2">
                	<div class="clear" style="height:20px"></div>
                	<input class="linebtn" type="submit" value="保存">
                	<a href="#" onclick="addclose();" class="greenbtn">取消</a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
<script>
function callback() {
	
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn();
		$('.popbox').css('display', 'block');
	}
function addclose() {
	$('#mask').fadeOut();
	$('.popbox').css('display', 'none');
}	



</script>
