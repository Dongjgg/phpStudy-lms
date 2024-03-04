<?php
include ('../conn.php');//修改分类信息的后端保存程序
$id=$_POST['id'];
$assort_name=$_POST['assort_name'];
$other=$_POST['other'];

$sql="update assort set
            assort_name='$assort_name'
            ,other='$other'
             where id = $id ";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('修改成功','assort_list.php');
}else{
    alert('修改失败','assort_list.php');
}