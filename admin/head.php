<?php
header('Content-Type:text/html;charset=utf-8');//头部文件声明
//链接数据库
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lmsdb"; // 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);// 检测连接
$conn ->set_charset('utf8');
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
//定义弹窗方法
function alert($str, $url)
{
    echo '<script> alert ("' . $str . '");location.href="' . $url . '";</script>';
}
//接受由登陆界面传来的数据
session_start();
if(!isset($_SESSION['username'])){
    alert('登陆失效，请重新登录','../login.php');
}//是否登陆有效，如数据库中的用户名与当前获取的用户名不一致，则警告无权访问
$sql="select * from borrow where state = 0";
$rs = mysqli_query($conn,$sql);
$num=mysqli_num_rows($rs);
if($num>0){
    $span = '<span class = "layui-badge-rim">'.$num.'</span>';
}else{
    $span = null;
}
function limits($limits){
    $conn = @mysqli_connect('localhost','root','root','lmsdb') or die ('链接失败');
    mysqli_query($conn,'set names utf8');
    $username=$_SESSION['username'];
    $sql= "select * from user where username = '$username' and limits like '%".$limits."%'";
    $rs=mysqli_query($conn,$sql);
    if(mysqli_num_rows($rs)<1){
        alert('您不具备访问该页面的权限','index.php');
        exit();
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>图书管理系统首页</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
    <script src="../layui/layui.js"></script>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-hide-xs layui-bg-black">图书管理系统</div>
        <!-- 头部区域-->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item layui-hide-xs"><a href="index.php">首页</a></li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item layui-hide-xs"><a href="../logout.php">退出登陆</a></li>
            <li class="layui-nav-item layui-hide layui-show-md-inline-block">
                <a href="javascript:;">
                    个人中心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="mine_info_list.php">个人信息</a></dd>
                    <dd><a href="mine_borrow_new.php">借阅申请</a></dd>
                    <dd><a href="mine_borrow_list.php">申请列表</a></dd>
                    <dd><a href="mine_book_list.php">我的书籍</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域  -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">图书管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="book_list.php">图书列表</a></dd>
                        <dd><a href="book_new.php">新增图书</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="assort_list.php">分类列表</a></dd>
                        <dd><a href="assort_new.php">新增分类</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">位置管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="position_list.php">位置列表</a></dd>
                        <dd><a href="position_new.php">新增位置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">借阅管理<?php echo $span ?></a>
                    <dl class="layui-nav-child">
                        <dd><a href="manage_borrow_list.php">申请列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="user_list.php">用户列表</a></dd>
                        <dd><a href="user_new.php">新增用户</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">权限设置</a>
                    <dl class="layui-nav-child">
                        <dd><a href="limits_list.php">修改权限</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>