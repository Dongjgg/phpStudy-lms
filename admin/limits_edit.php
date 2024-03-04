<?php
include ('head.php');
$id=$_GET['id'];
$sql= "select * from user where id= $id";
$rs=mysqli_query($conn,$sql);
if($rs){
    $row = mysqli_fetch_assoc($rs);
}
function checkbox_limits($limits){
    $conn = @mysqli_connect('localhost','root','root','lmsdb') or die ('链接失败');
    mysqli_query($conn,'set names utf-8');
    $id = $_GET['id'];
    $sql = "select * from user where id = $id and limits like '%".$limits."%'";
    $rs = mysqli_query($conn,$sql);
    if(mysqli_num_rows($rs)>0){
        echo 'checked';
    }
}
limits('权限管理');
?>
<div class="layui-body">
    <!-- 权限管理-修改用户权限 -->
    <div style="padding: 15px;">
        <h2>权限管理</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">修改用户权限</a></li>
            </ul>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div class="layui-row">
                    <div class="layui-col-md6">
                        <form class="layui-form" method="post" action="limits_update.php">
                            <input type="hidden" name=id value="<?php echo $row['id'] ?>">
                            <div class="layui-form-item">
                                <label class="layui-form-label">用户名称*</label>
                                <div class="layui-input-block">
                                    <input type="text" name="username" required lay-verify="required" class="layui-input"
                                    value="<?php echo $row['username'] ?>"
                                    disabled="disabled" >
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">真实姓名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="real_name" class="layui-input"
                                           value="<?php echo $row['real_name'] ?>" disabled="disabled" >
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">权限设置</label>
                                <div class="layui-input-block">
                                    <input type="checkbox" name="limits0" value="图书管理" title="图书管理" <?php checkbox_limits('图书管理');?>>
                                    <input type="checkbox" name="limits1" value="分类管理" title="分类管理" <?php checkbox_limits('分类管理');?>>
                                    <input type="checkbox" name="limits2" value="位置管理" title="位置管理" <?php checkbox_limits('位置管理');?>>
                                    <input type="checkbox" name="limits3" value="借阅管理" title="借阅管理" <?php checkbox_limits('借阅管理');?>>
                                    <input type="checkbox" name="limits4" value="用户管理" title="用户管理" <?php checkbox_limits('用户管理');?>>
                                    <input type="checkbox" name="limits5" value="权限管理" title="权限管理" <?php checkbox_limits('权限管理');?>>
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