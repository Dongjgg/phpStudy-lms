<?php
include ('../conn.php');//修改图书信息的后端保存程序
$id=$_POST['id'];
$book_name=$_POST['book_name'];
$book_assort=$_POST['book_assort'];
$book_position=$_POST['book_position'];
$book_num=$_POST['book_num'];
$sql="update book set
            book_name='$book_name'
            ,book_assort='$book_assort'
            ,book_position='$book_position'
            ,book_num='$book_num'
             where id = $id ";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('修改成功','book_list.php');
}else{
    alert('修改失败','book_list.php');
}