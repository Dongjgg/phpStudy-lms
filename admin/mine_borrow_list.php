<?php
include ('head.php');
?>
 <div class="layui-body">
        <!-- 个人中心-申请列表 -->
        <div style="padding: 15px;">
            <h2>个人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li><a href="mine_info_list.php">个人信息</li>
                    <li><a href="mine_borrow_new.php">借阅申请</a></li>
                    <li class="layui-this">申请列表</a></li>
                    <li><a href="mine_book_list.php">我的书籍</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div>
                        <form class="layui-form" method="post" action="mine_borrow_list_search.php">
                            <div class="layui-inline">
                                <input class = "layui-input" name="search" style="width:350px" placeholder="按图书名称查找">
                            </div>
                            <button class="layui-btn layui-btn-normal" type="submit">搜索</button>
                        </form>
                    </div>
                    <script type="text/html" id="toolbar">
                        <div class="layui-btn-container">
                            <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
                            <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
                        </div>
                    </script>
                    <table class="layui-table" lay-data="{height:543, page:true, id:'id_table' ,toolbar: true}" lay-filter="test">
                        <thead>
                            <tr>
                                <td lay-data="{field:'id',sort:true}">ID</td>
                                <td lay-data="{field:'book_name'}">图书名称</td>
                                <td lay-data="{field:'num'}">申请数量</td>
                                <td lay-data="{field:'',toolbar:'#toolbar',width:100}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $entry_user=$_SESSION['username'];
                        $sql="select * from borrow where entry_user = '$entry_user'order by id";
                        $rs = mysqli_query($conn,$sql);
                        if($rs){
                            while ($rows = mysqli_fetch_assoc($rs)){
                                echo '<tr>';
                                echo '<td>'.$rows['id'].'</td>';
                                echo '<td>'.$rows['book_name'].'</td>';
                                echo '<td>'.$rows['borrow_num'].'</td>';
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
                                if(eventName=='del'){
                                    //删除
                                    layer.confirm("您确认删除吗？",function (index) {
                                        obj.del();
                                        layer.close(index);
                                        window.location.href="mine_borrow_delete.php?id="+arr[0];
                                    })
                                }else if(eventName=='edit'){
                                    //修改
                                    window.location.href="mine_borrow_edit.php?id="+arr[0];
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