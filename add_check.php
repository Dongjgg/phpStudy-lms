<?php
include ('conn.php');
//接受由登陆界面传来的数据
$username=$_POST['username'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$sql="select * from user where username = '$username'";
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs) > 0){
    alert('该用户名已经存在','add.php');
    exit();
}
if(strlen($username)<5){
    alert('用户名不能少于5个字','add.php');
    exit();
}
if($password1!=$password2){
    alert('两次输入的密码不相同，请重新输入','add.php');
    exit();
}

//向user数据表新增一条用户信息
$sql="insert into user (username, password)
VALUES ('$username', '$password1')";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('注册成功','login.php');
}else{
    alert('注册失败','add.php');
}
