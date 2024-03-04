<?php
include ('../conn.php');//新增图书信息的后端保存程序
$book_name=$_POST['book_name'];
$book_assort=$_POST['book_assort'];
$book_position=$_POST['book_position'];
$book_num=$_POST['book_num'];
$sql="select * from book where book_name = '$book_name'";//查找当前数据表中是否存在该分类
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs) > 0){
    alert('该图书已经存在','book_new.php');
    exit();
}
//向book数据表新增一条分类信息
$sql="insert into book (book_name, book_assort,book_position,book_num)
VALUES ('$book_name', '$book_assort','$book_position',$book_num)";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('添加成功','book_list.php');
}else{
    alert('添加失败','book_new.php');
}