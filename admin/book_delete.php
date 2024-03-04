<?php
//图书信息删除功能实现
include ('../conn.php');
$id=$_GET['id'];
$sql="delete from book where id = $id ";
$rs = mysqli_query($conn,$sql);
if($rs){
    alert('删除成功','book_list.php');
}else{
    alert('删除失败','book_list.php');
}