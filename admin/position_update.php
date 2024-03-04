<?php
include ('../conn.php');//修改位置信息的后端保存程序
$id=$_POST['id'];
$position_name=$_POST['position_name'];
$position_other=$_POST['position_other'];

$sql="update position set
            position_name='$position_name'
            ,position_other='$position_other'
             where id = $id ";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('修改成功','position_list.php');
}else{
    alert('修改失败','position_list.php');
}