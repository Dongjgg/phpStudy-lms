<?php
include ('../conn.php');//归还书籍后端处理界面
$id=$_GET['id'];
$sql = "select * from borrow where id = $id";//获取状态信息
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rs);
$state = $row['state'];
if($state == 2 || $state == 0){//先判定是否需要归还，如不需要 则结束程序
    alert('该书籍处于未通过状态，不需要归还','mine_book_list.php');
    exit();
}
$book_id=$row['book_id'];
$book_sql = "select * from book where id = $book_id";//获取现有书籍的数量
$book_rs=mysqli_query($conn,$book_sql);
$book_row=mysqli_fetch_assoc($book_rs);
$book_num=$book_row['book_num'];
$borrow_num = $row['borrow_num'];
$book_num=$book_num+$borrow_num;//获取归还后的书籍数量
$sql_book="update book set book_num = $book_num where id = $book_id";
$rs_book=mysqli_query($conn,$sql_book);//更新book数据表中的书籍总数量
$sql_borrow="update borrow set state = 3 where id = $id";
$rs_borrow=mysqli_query($conn,$sql_borrow);
if($rs_borrow and $book_row){
    alert('已归还成功，并恢复该书籍数量','mine_book_list.php');
}else{
    alert('操作失败','mine_book_list.php');
}
