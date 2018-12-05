

   <!-- 引入模板头部 -->
@include('mould/header')
@include('mould/left')
<div id="urHere">积云教育 管理中心<b>></b><strong>帮助中心</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">

        <h3><a href="{{url('login/shows')}}" class="actionBtn add">添加帮助数据</a>帮助中心{{Session::get('message')}}</h3>
       <!-- <p >{{$data->id}}</p> -->
     <p style="margin-left:60px;font-size: 25px;" >  标题：{{$data->bt}}</p>
       <p style="margin-left:60px;font-size: 22px;">副标题：{{$data->fbt}}</p>
        <p style="margin-left:60px;font-size: 18px;">发布人：{{$data->username}}</p>
       <p style="margin-left:60px;font-size: 18px;">发布时间：{{$data->date}}</p>
       <p style="margin-left:20px;font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;内容详情：{{$data->text}}</p>
      
 @include('mould/tail')
</body>
</html>