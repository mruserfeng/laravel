<!-- 调用页面 -->
<!-- 头部 -->
<!-- 头部 -->
@include('mould/header')
@include('mould/left')
   <!-- 当前位置 -->
<div id="urHere">积云教育<b>></b><strong>新闻管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
<div style="font-size:25px;color:red;text-align:center;font-weight:bolder;">
      @if(Session::has('update'))
          {{Session::get('update')}}
      @endif
      @if(Session::has('del'))
          {{Session::get('del')}}
      @endif
      @if(Session::has('insert'))
          {{Session::get('insert')}}
      @endif
      </div>
        <h3><a href="{{url('xinweninsert')}}" class="actionBtn add">添加新闻</a>新闻管理</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
         <tr>
          <td align="center"><input type="button" class="btn" value="全选" id="all"></td>
          <td align="center"><input type="button" class="btn" value="反选" id="fan"></td>
          <td align="center"><a href="" name="checkall" id="notall" class="btn">取消</a></td>
          <td align="center"><a href="#" name="del" id="del" class="btn">批量删除</a></td>
     </tr>
      <tr>
     <tr>
           <th width="60">选择</th>
        <th width="30" align="center">id</th>
      <th align="center" width="80">新闻标题</th>
        <th align="center" width="80">新闻副标题</th>
        <th width="80" align="center">文章内容</th>
        <th width="80" align="center">发布人</th>
        <th width="80" align="center">发布时间</th>
        <th width="80" align="center">操作</th>
      </tr>
      @foreach($data as $v)
            <tr>
        <td align="center"><input type="checkbox" value="{{$v->id}}" name="box"></td>
        <td align="center">{{$v->id}}</td>
        <td align="center">{{$v->jouli_bt}}</td>
        <td  align="center">{{$v->jouli_fbt}}</td>
        <td align="center">{{mb_substr($v->jouli_text,1,100)}}</td>
        <td align="center">{{$v->username}}</td>
        <td align="center">{{$v->jouli_date}}</td>
        <td align="center">
        <a href="xinwenupdate?id={{$v->id}}">编辑</a> | <a href="xinwendel?id={{$v->id}}">删除</a></td>
      </tr>
      @endforeach
      <tr><td id="pull_right"colspan="7">{{$data->render()}}</td></tr>
          </table>
           </div>
 </div>
@include('mould/tail')
<script>
$(function(){
  // 全选
  $("#all").click(function(){
    $("table input:checkbox").prop('checked',true);
  })
  // 取消全选
  $('#notall').click(function(){
    $('table input:checkbox').prop('checked',false);
  })
  // 反选
  $('#fan').click(function(){
    $('table input').each(function(){
      this.checked=!this.checked;
    })
  })
//批量删除
            $("#del").click(function(){
                var  box = $("input[name='box']");
                length =box.length;
//                alert(length);
                var str ="";
                for(var i=0;i<length;i++){
                    if(box[i].checked==true){
                        str =str+","+box[i].value;
                    }
                }
                str= str.substr(1);
//                alert(str)
                location.href="xinwendeletes?id="+str;
            })
          })
</script>