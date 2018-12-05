
<!-- 引入模板头部 -->
@include('mould/header')
@include('mould/left')
<div id="urHere">积云教育 管理中心<b>></b><strong>添加通知</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="{{url('login/shows')}}" class="actionBtn">通知列表</a>添加通知</h3>
    <form action="{{url('favourable/edit')}}" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      
        <input type="hidden" name="id" size="40" class="inpMain" value="{{$data->id}}"/>
      
      <tr>
       <td width="80" align="right">通知标题</td>
       <td>
        <input type="text" name="bt" size="40" class="inpMain" value="{{$data->bt}}"/>
       </td>
      </tr>

      <tr>
       <td align="right">通知副标题</td>
       <td>
        <input type="text" name="fbt"  size="40" class="inpMain" value="{{$data->fbt}}"/>
       </td>
      </tr>
     <tr>
       <td align="right" valign="top" >详细介绍</td>
       <td>
        <!-- KindEditor -->
      <link rel="stylesheet" href="{{asset('app')}}/js/kindeditor/themes/default/default.css" />
      <link rel="stylesheet" href="{{asset('app')}}/js/kindeditor/plugins/code/prettify.css" />
      <script charset="utf-8" src="{{asset('app')}}/js/kindeditor/kindeditor.js"></script>
      <script charset="utf-8" src="{{asset('app')}}/js/kindeditor/lang/zh_CN.js"></script>
      <script charset="utf-8" src="{{asset('app')}}/js/kindeditor/plugins/code/prettify.js"></script>
    
        <script>
          KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content"]', {
              cssPath : '../plugins/code/prettify.css',
              uploadJson : '../php/upload_json.php',
              fileManagerJson : '../php/file_manager_json.php',
              allowFileManager : true,
              afterCreate : function() {
                var self = this;
                K.ctrl(document, 13, function() {
                  self.sync();
                  K('form[name=example]')[0].submit();
                });
                K.ctrl(self.edit.doc, 13, function() {
                  self.sync();
                  K('form[name=example]')[0].submit();
                });
              }
            });
            prettyPrint();
          });
      </script>
        <!-- /KindEditor -->
        <textarea id="content"  name="text" style="width:780px;height:400px;" class="textArea">
          {{$data->text}}
        </textarea>
       </td>
      </tr>
      <tr>
       <td align="right">发布人</td>
       <td>
        <input type="text" name="username"  value="{{$data->username}}" size="5" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        
        <input class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
       </div>
 </div>
 <!-- 引入模板头部 -->
@include('mould/tail');
