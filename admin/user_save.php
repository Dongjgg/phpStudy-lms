<?php
include ('../conn.php');//新增用户信息的后端保存程序
$username=$_POST['username'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$real_name=$_POST['real_name'];
$sql="select * from user where username = '$username'";//查找当前数据表中是否存在该用户名
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs) > 0){
    alert('该用户名已经存在','user_new.php');
    exit();
}
if(strlen($username)<5){//判定用户名是否符合格式要求
    alert('用户名不能少于5个字','user_new.php');
    exit();
}
if($password1!=$password2){//判定2次输入的密码是否一致
    alert('两次输入的密码不相同，user_new','add.php');
    exit();
}
//向user数据表新增一条用户信息
$sql="insert into user (username, password,real_name)
VALUES ('$username', '$password1','$real_name')";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('添加成功','user_list.php');
}else{
    alert('添加失败','user_new.php');
}