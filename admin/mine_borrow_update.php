<?php
include ('../conn.php');//修改借阅申请的后端保存程序
$id=$_POST['id'];
$borrow_num=$_POST['borrow_num'];

$sql="update borrow set 
            borrow_num=$borrow_num
             where id = $id ";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('修改成功','mine_borrow_list.php');
}else{
    alert('修改失败','mine_borrow_list.php');
}