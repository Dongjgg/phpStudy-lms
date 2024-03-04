<?php
include ('../conn.php');//更新借阅处理结果保存程序
$id=$_POST['id'];
$book_id=$_POST['book_id'];
$borrow_num=$_POST['borrow_num'];
$book_num=$_POST['book_num'];
$state= $_POST['state'];

if($state==1){
    $book_num=$book_num-$borrow_num;//如果通过借阅申请，那么就需要将书籍的总数量核减至借阅后的数量即：97=100-3
    $sql= "update book set book_num = $book_num where id = $book_id";//并更新书籍信息内的书籍数量
    $rs = mysqli_query($conn,$sql);
}
$sql="update borrow set
            state=$state
             where id = $id ";
$rs=mysqli_query($conn,$sql);
if($rs){
    alert('处理成功','manage_borrow_list.php');
}else{
    alert('处理失败','manage_borrow_list.php');
}