<?php
header('Content-Type:text/html;charset=utf-8');//头部文件声明
//链接数据库
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "lmsdb"; // 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);// 检测连接
$conn ->set_charset('utf8');//设置字符类型
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
