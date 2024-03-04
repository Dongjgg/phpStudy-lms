<?php
include ('../conn.php');//新增分类信息的后端保存程序
$assort_name=$_POST['assort_name'];
$other=$_POST['other'];
$sql="select * from assort where assort_name = '$assort_name'";//查找当前数据表中是否存在该分类
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs) > 0){
    alert('该分类已经存在','assort_new.php');
    exit();
}
//向assort数据表新增一条分类信息
$sql="insert into assort (assort_name, other)
VALUES ('$assort_name', '$other')";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('添加成功','assort_list.php');
}else{
    alert('添加失败','assort_new.php');
}