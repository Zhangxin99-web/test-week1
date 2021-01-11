<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    <script src="/layui/layui.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
    <title>分配任务</title>
</head>
<body>

<form class="layui-form" id="form" method="post">
    @csrf
    <h2 style="text-align: center">新建任务</h2>
    <br>
    <div class="layui-form-item">
        <label class="layui-form-label">任务名称</label>
        <div class="layui-input-block">
            <input type="text" name="task_name" id="task_name" required  lay-verify="required"  autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">负责人</label>
        <div class="layui-input-block">
            <select name="s_id"  id="s_id" lay-verify="required">
                @foreach($salesman as $val)
                <option value="{{$val->id}}">{{$val->salesman}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">开始时间</label>
        <div class="layui-input-inline">
            <input type="date" name="start_time" id="start_time" required lay-verify="required"  autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">结束时间</label>
        <div class="layui-input-inline">
            <input type="date" name="end_time" id="end_time" required lay-verify="required"  autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">优先级</label>
        <div class="layui-input-block">
            <input type="radio" name="level" value="高" title="高">
            <input type="radio" name="level" value="中" title="中" checked>
            <input type="radio" name="level" value="低" title="低">
            <input type="radio" name="level" value="无" title="无" >
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">任务描述</label>
        <div class="layui-input-block">
            <textarea name="desc" id="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" type="button" id="sub">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        //     layer.msg(JSON.stringify(data.field));
            // console.log(data.field);
            $(function () {
                $("#sub").click(function () {
                    var task_name=$("#task_name").val()
                    var s_id=$("#s_id").val()
                    var start_time=$("#start_time").val()
                    var end_time=$("#end_time").val()
                    var desc=$("#desc").val()
                    var _token="{{csrf_token()}}" 
                    console.log(_token)
                    $.ajax({
                        type: "POST",
                        url: "{{url("save")}}",
                        data: {
                            _token:_token,
                            task_name:task_name,
                            s_id:s_id,
                            start_time:start_time,
                            end_time:end_time,
                            desc:desc
                        },
                        success: function(msg){
                            if (msg.code==200){
                                location.href="{{url("http://c.quanzhan.com/index")}}"
                            }
                        }
                    });
                })
            })

            // return false;
    });
</script>
</body>
</html>
<script>
//     $().ready(function() {
// // 在键盘按下并释放及提交后验证提交表单
//         $("#form").validate({
//             rules: {
//                 task_name: {
//                     required: true,
//                     minlength: 2
//                 },
//                 s_id: {
//                     required: true,
//                 },
//             },
//             messages: {
//                 task_name: {
//                     required: "请输入用户名",
//                 },
//                 s_id: {
//                     required: "请输入密码",
//                 },
//             }
//         })
//     });
</script>
