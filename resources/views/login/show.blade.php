<!-- 引入模板头部 -->
@include('mould/header')
@include('mould/left')
<div id="urHere">积云教育管理中心<b>></b><strong>帮助中心</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <h3><a href="{{url('login/shows')}}" class="actionBtn add">添加帮助数据</a>帮助中心{{Session::get('message')}}</h3>

    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
     <tr>
      
        <th><input type="checkbox" name="" id="CheckAll"" onclick="IsCheckAll()"></th>  
        <th  align="left">ID</th>
        <th align="left"><a href="{{url('login/msg')}}">标题</a></th>
        <th align="left">副标题</th>
        
        <th align="left">发布人</th>
        <th width="100" align="center">时间</th>
        
        <th width="80" align="center">操作</th>
      </tr>
      @foreach($data as $v)
      <tr>
         <td><input type="checkbox" name="box" class="api_pro_list" value="{{$v->id}}"></td> 
        <td align="left" >{{$v->id}}</td>
       
        <td>{{$v->bt}}</td>
        <!-- 即点即改-->
       <td onclick="updateUser({{$v->id}})">
          <input type="text" value="{{$v->fbt}}" id="c{{$v->id}}" style="display: none" onblur="saveUser({{$v->id}})">
         <span id="a{{$v->id}}">{{$v->fbt}}</span> 
        </td>
     
        <td>{{$v->username}}</td>
        <td>{{$v->date}}</td>
       
        <td align="center">
          <a href="{{url('login/update')}}/{{$v->id}}">编辑</a> | 
          <a href="{{url('login/delete')}}/{{$v->id}}">删除</a>
        </td>
      </tr>
     
      @endforeach  
       <tr align="center">
        <td colspan="7"> 
          <div id="pull_right">
            <div class="pull-right">
          {!! $data->render() !!}
        </div>
       </div>
     </td>
   </tr> 
 </table>
          <button class="pl">批量删除</button> 
          <input type="button" value="全选" onclick="qx()">
          <input type="button" value="反选" onclick="fx()" name="all">
          <input type="button" value="全不选" onclick="qbx()">

           </div>
 </div>

 @include('mould/tail')
</body>
</html>
<script src="{{asset('login')}}/js/jq.js"></script> 
<script>
  //副标题即改即点
    function updateUser(id){
    document.getElementById("c"+id).style.display="block";//根据ID将文本框的样式显示出来
    document.getElementById("a"+id).innerHTML="";//根据span标签的信息隐藏起来

 }
 //鼠标离开触发即点即改事件
 function saveUser(id){
  var fbt=$("#c"+id).val();
  $.ajax({
    type:"POST",
    url:"{{url('saveUsernamed')}}",
    data:{
      id:id,
      inform_fbt:fbt
    },success:function(e){
      document.getElementById("c"+id).style.display="none";//根据ID将文本框的样式隐藏出来
      document.getElementById("a"+id).innerHTML=fbt;//根据span标签的信息隐藏起来
   }
  })
 }

 //批量删除  
    $(".pl").click(function(){  
       var  box = $("input[name='box']");  
          length =box.length;  
       //alert(length);  
       var str ="";  
      for(var i=0;i<length;i++){  
           if(box[i].checked==true){  
                str =str+","+box[i].value;  
           }   
       }  
       str= str.substr(1)  
       // alert(str);  
         
       location.href="{{url('login/del_all')}}?id="+str;  
    }) 
    //全选
    function qx(){
        var box=document.getElementsByName('box');
//        alert(box);
        for(var i=0;i<=box.length;i++){
            box[i].checked=true;
        }
    }
 
    //全不选
    function qbx(){
        var box=document.getElementsByName('box');
//        alert(box);
        for(var i=0;i<=box.length;i++){
            if(box[i].checked=true){
                box[i].checked=false;
            }
        }
    }
 
    //反选
    function fx(){
        var box=document.getElementsByName('box');
        for(var i=0;i<=box.length;i++){
           box[i].checked= !box[i].checked;
        }
    }


</script>