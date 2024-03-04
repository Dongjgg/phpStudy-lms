<?php
include ('../conn.php');//新增图书借阅信息的后端保存程序
$book_id=$_POST['book_id'];
$book_name=$_POST['book_name'];
$borrow_num=$_POST['borrow_num'];
$entry_user = $_SESSION['username'];
//向book数据表新增一条分类信息
$sql="insert into borrow (book_name, book_id,borrow_num,entry_user)
VALUES ('$book_name', $book_id,$borrow_num,'$entry_user')";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('添加成功','mine_borrow_list.php');
}else{
    alert('添加失败','mine_borrow_new.php');
}