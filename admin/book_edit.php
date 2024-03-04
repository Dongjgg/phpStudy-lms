<?php
include ('head.php');
$id=$_GET['id'];
$sql="select * from book where id = $id";
$rs = mysqli_query($conn,$sql);
if($rs){
    $row = mysqli_fetch_assoc($rs);
}
limits('图书管理');
?>
    <div class="layui-body">
        <!-- 图书管理-修改图书信息 -->
        <div style="padding: 15px;">
            <h2>图书管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li class="layui-this">新增图书</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md6">
                            <form class="layui-form" method="post" action="book_update.php">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">图书名称*</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_name" required lay-verify="required" class="layui-input" value="<?php echo $row['book_name'] ?>">
                                    </div>                                    
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">图书类型</label>
                                    <div class="layui-input-block">
                                        <select name="book_assort" lay-verify="required">
                                            <option value="">请选择类型</option>
                                            <?php
                                            $sql="select * from assort order by id";
                                            $rs=mysqli_query($conn,$sql);
                                            if($rs){
                                                while ($rows = mysqli_fetch_assoc($rs)){
                                                    if($rows['assort_name']==$row['book_assort']){
                                                        echo "<option selected = \"selected\" value=\"".$rows['assort_name']."\">".$rows['assort_name']."</option>";
                                                    }else{
                                                        echo "<option value=\"".$rows['assort_name']."\">".$rows['assort_name']."</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">存放位置</label>
                                    <div class="layui-input-block">
                                        <select name="book_position" lay-verify="required">
                                            <option value="">请选择类型</option>
                                            <?php
                                            $sql="select * from position order by id";
                                            $rs=mysqli_query($conn,$sql);
                                            if($rs){
                                                while ($rows = mysqli_fetch_assoc($rs)){
                                                    if($rows['position_name']==$row['book_position']){
                                                        echo "<option selected = \"selected\" value=\"".$rows['position_name']."\">".$rows['position_name']."</option>";
                                                    }else{
                                                        echo "<option value=\"".$rows['position_name']."\">".$rows['position_name']."</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">数量*</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_num" class="layui-input" lay-verify="required" value="<?php echo $row['book_num'] ?>">
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
