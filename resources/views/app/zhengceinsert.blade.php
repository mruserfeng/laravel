<!-- 调用页面 -->
<!-- 头部 -->
<!-- 头部 -->
@include('mould/header')
@include('mould/left')
   <!-- 当前位置 -->
<div id="urHere">积云教育<b>></b><strong>添加政策</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="article_category.html" class="actionBtn">新闻管理</a>添加政策</h3>
    <form action="{{url('zhengceinsert')}}" method="post">
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right">新闻标题</td>
       <td>
        <input type="text" name="zc_bt" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">新闻副标题</td>
       <td>
        <input type="text" name="zc_fbt" value="" size="40" class="inpMain" />
       </td>
         <tr>
       <td align="right">发布人</td>
       <td>
        <input type="text" name="username" value="" size="40" class="inpMain" />
       </td>
      </tr>
      </tr>
               <tr>
       <td align="right" valign="top">新闻内容</td>
       <td>
        <!-- KindEditor -->
      <link rel="stylesheet" href="{{asset('app')}}/js/kindeditor/themes/default/default.css" />
      <link rel="stylesheet" href="{{asset('app')}}/js/kindeditor/plugins/code/prettify.css" />
      <script charset="utf-8" src="{{asset('app')}}/js/kindeditor/kindeditor.js"></script>
      <script charset="utf-8" src="{{asset('app')}}/js/kindeditor/lang/zh_CN.js"></script>
      <script charset="utf-8" src="{{asset('app')}}/js/kindeditor/plugins/code/prettify.js"></script>
        <script>
          KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="zc_text"]', {
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
        <textarea id="content" name="zc_text" style="width:780px;height:400px;" class="textArea"></textarea>
       </td>
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="25bfda40" />
        <input type="hidden" name="cat_id" value="" />
        <input name="submit" class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
       </div>
 </div>
 @include('mould/tail')