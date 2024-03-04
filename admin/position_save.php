<?php
include ('../conn.php');//新增位置信息的后端保存程序
$position_name=$_POST['position_name'];
$position_other=$_POST['position_other'];
$sql="select * from position where position_name = '$position_name'";//查找当前数据表中是否存在该分类
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs) > 0){
    alert('该位置已经存在','position_new.php');
    exit();
}
//向position数据表新增一条分类信息
$sql="insert into position (position_name, position_other)
VALUES ('$position_name', '$position_other')";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('添加成功','position_list.php');
}else{
    alert('添加失败','position_new.php');
}