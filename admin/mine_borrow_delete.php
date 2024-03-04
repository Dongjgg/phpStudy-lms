<?php
//分类信息删除功能实现
include ('../conn.php');
$id=$_GET['id'];
$sql="delete from borrow where id = $id ";
$rs = mysqli_query($conn,$sql);
if($rs){
    alert('删除成功','mine_borrow_list.php');
}else{
    alert('删除失败','mine_borrow_list.php');
}