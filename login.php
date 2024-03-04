<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8">
    <title>图书管理系统登陆界面</title>
    <link rel = "stylesheet" href = "layui/css/layui.css">
    <script src="layui/layui.js"></script>
</head>
<body>
    <div class="layui-container">
        <div style = "height: 150px"></div>
        <div class="layui-row">
            <div class="layui-col-md4" style="height: 150px"></div>
            <div class="layui-col-md4" style="height: 150px">
                <p style="text-align: center;font-size: 35px">图书管理系统-登陆界面</p>
                <div style="height: 25px"></div>
                <form class="layui-form" action="login_check.php" method="post">
                    <input type="text" name="username" placeholder="请输入用户名" class="layui-input">
                    <div style="height: 15px"></div>
                    <input type="password" name="password" placeholder="请输入密码" class="layui-input">
                    <div style="height: 15px"></div>
                    <input type="submit" value="登陆" class="layui-btn layui-btn-normal layui-btn-fluid">
                </form>
                <div style="height: 15px"></div>
                <a href="add.php" style="color: #00A000">无账号点此注册</a>
            </div>
            <div class="layui-col-md4" style="height: 150px"></div>
        </div>
    </div>
<script>
    layui.use('form',function(){
        var form = layui.form;
    });
</script>

</body>
</html>
