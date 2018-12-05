<!-- 调用页面 -->
<!-- 头部 -->
<!-- 头部 -->
@include('mould/header')
@include('mould/left')
   <!-- 当前位置 -->
<div id="urHere">积云教育<b>></b><strong>修改学生</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="{{url('student')}}" class="actionBtn">意向学生管理</a>修改学生</h3>
    <form action="{{url('studentinsert')}}" method="post">
    <input type="hidden" name="id" value="{{$data->id}}">
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right">姓名</td>
       <td>
        <input type="text" name="username" value="{{$data->username}}" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">身份证号</td>
       <td>
        <input type="text" name="card" value="{{$data->card}}" size="40" class="inpMain" />
       </td>
         <tr>
       <td align="right">学历</td>
       <td>
        <select name="education">
                    <option value="1" @if($data->education==1)
                     selected
                    @endif>小学</option>
                    <option value="2"@if($data->education==2)
                     selected
                    @endif
                    >初中</option>
                    <option value="3" @if($data->education==3)
                     selected
                    @endif
                    >高中</option>
                    <option value="4" @if($data->education==4)
                     selected
                    @endif
                    >大学</option>
                    <option value="5" @if($data->education==5)
                     selected
                    @endif>其他</option>
         </select>
       </td>
      </tr>
        <tr>
       <td align="right">手机号</td>
       <td>
          <input type="text" name="tel" size="40" class="inpMain" value="{{$data->tel}}">
       </td>
      </tr>
            </tr>
        <tr>
       <td align="right">性别</td>
       <td>
          <input type="radio" name="sex" size="40" value="1" 
          @if($data->sex==1)
          checked
          @endif
          >男
          <input type="radio" name="sex" size="40" value="2" 
          @if($data->sex==2)
          checked
          @endif>女
       </td>
      </tr>
      </tr>
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