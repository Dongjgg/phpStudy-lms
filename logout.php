<?php
//登出账号功能
include ('conn.php');
$_SESSION=[];
session_destroy();
alert('已成功退出','login.php');