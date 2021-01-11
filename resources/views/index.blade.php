<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 实例</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>任务列表</h2>
    <table class="table table-bordered">

        <tr>
            <th>任务名称</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>任务描述</th>
        </tr>
        @foreach($data as $val)
        <tr>
            <td>{{$val->task_name}}</td>
            <td>{{$val->start_time}}</td>
            <td>{{$val->end_time}}</td>
            <td>{{$val->desc}}</td>
        </tr>
        @endforeach

    </table>
</div>
{{ $data->links() }}
</body>
</html>
