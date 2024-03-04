<?php
include ('head.php');
?>
 <div class="layui-body">
        <!-- 个人中心-个人信息表 -->
        <div style="padding: 15px;">
            <h2>个人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li class="layui-this">个人信息</li>
                    <li><a href="mine_borrow_new.php">借阅申请</a></li>
                    <li><a href="mine_borrow_list.php">申请列表</a></li>
                    <li><a href="mine_book_list.php">我的书籍</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <script type="text/html" id="toolbar">
                        <div class="layui-btn-container">
                            <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
                        </div>
                    </script>
                    <table class="layui-table" lay-data="{height:543, id:'id_table' ,toolbar: true}" lay-filter="test">
                        <thead>
                            <tr>
                                <td lay-data="{field:'id',sort:true}">ID</td>
                                <td lay-data="{field:'username'}">用户名</td>
                                <td lay-data="{field:'real_name'}">真实姓名</td>
                                <td lay-data="{field:'',toolbar:'#toolbar',width:60}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $username=$_SESSION['username'];
                        $sql="select * from user where username = '$username' order by id";
                        $rs = mysqli_query($conn,$sql);
                        if($rs){
                            while ($rows = mysqli_fetch_assoc($rs)){
                                echo '<tr>';
                                echo '<td>'.$rows['id'].'</td>';
                                echo '<td>'.$rows['username'].'</td>';
                                echo '<td>'.$rows['real_name'].'</td>';
                                echo '<td></td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <script>
                        layui.use('table', function(){
                            var table = layui.table;
                            table.on('tool(test)',function (obj) {
                                var tr = obj.data;
                                let arr = Object.values(tr);
                                var eventName = obj.event;
                                if(eventName=='edit'){
                                    //修改
                                    window.location.href="mine_info_edit.php?id="+arr[0];
                                }
                            });
                        });
                    </script>
                </div>

            </div>
        </div>
    </div>
<?php
include ('foot.php');