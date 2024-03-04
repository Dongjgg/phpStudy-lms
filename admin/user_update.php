<?php
include ('../conn.php');//修改用户信息的后端保存程序
$id=$_POST['id'];
$username=$_POST['username'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$real_name=$_POST['real_name'];
if(strlen($username)<5){//判定用户名是否符合格式要求
    alert('用户名不能少于5个字','user_list.php');
    exit();
}
if($password1!=$password2){//判定2次输入的密码是否一致
    alert('两次输入的密码不相同，user_list','add.php');
    exit();
}
$sql="update user set 
            username='$username'
            ,password='$password1'
            ,real_name='$real_name'
             where id = $id ";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('修改成功','user_list.php');
}else{
    alert('修改失败','user_list.php');
}