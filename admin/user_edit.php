<?php
include ('head.php');
$id=$_GET['id'];
$sql= "select * from user where id= $id";
$rs=mysqli_query($conn,$sql);
if($rs){
    $row = mysqli_fetch_assoc($rs);
}
limits('用户管理');
?>
<div class="layui-body">
    <!-- 用户管理-修改用户信息 -->
    <div style="padding: 15px;">
        <h2>用户管理</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">修改用户信息</a></li>
            </ul>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div class="layui-row">
                    <div class="layui-col-md6">
                        <form class="layui-form" method="post" action="user_update.php">
                            <input type="hidden" name=id value="<?php echo $row['id'] ?>">
                            <div class="layui-form-item">
                                <label class="layui-form-label">用户名称*</label>
                                <div class="layui-input-block">
                                    <input type="text" name="username" required lay-verify="required" class="layui-input"
                                    value="<?php echo $row['username'] ?>"
                                    >
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">登陆密码*</label>
                                <div class="layui-input-block">
                                    <input type="password" name="password1" required lay-verify="required" class="layui-input"
                                           value="<?php echo $row['password'] ?>"
                                    >
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">再次输入密码*</label>
                                <div class="layui-input-block">
                                    <input type="password" name="password2" required lay-verify="required" class="layui-input"
                                           value="<?php echo $row['password'] ?>">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">真实姓名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="real_name" class="layui-input"
                                           value="<?php echo $row['real_name'] ?>">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input type="submit" class="layui-btn layui-btn-normal" value="立即提交">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include ('foot.php');