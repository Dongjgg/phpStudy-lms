<?php
include ('../conn.php');//修改用户信息的后端保存程序
$id=$_POST['id'];
$limits = array(
    $_POST['limits0']
    ,$_POST['limits1']
    ,$_POST['limits2']
    ,$_POST['limits3']
    ,$_POST['limits4']
    ,$_POST['limits5']
);
$limits = implode(" ",$limits);

$sql="update user set 
            limits='$limits'
             where id = $id ";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('修改成功','limits_list.php');
}else{
    alert('修改失败','limits_list.php');
}