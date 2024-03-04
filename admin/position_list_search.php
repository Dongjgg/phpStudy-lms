<?php
include ('head.php');
limits('位置管理');
?>
 <div class="layui-body">
        <!-- 位置管理-位置信息列表-搜索结果 -->
        <div style="padding: 15px;">
            <h2>位置管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li class="layui-this">搜索结果</li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div>
                        <form class="layui-form" method="post" action="position_list_search.php">
                            <div class="layui-inline">
                                <input class = "layui-input" name="search" style="width:350px" placeholder="按位置名称查找">
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
                                <td lay-data="{field:'position_name'}">位置名称</td>
                                <td lay-data="{field:'position_other'}">位置说明</td>
                                <td lay-data="{field:'',toolbar:'#toolbar',width:100}">操作</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $position_name = $_POST['search'];
                        if($position_name==''){
                            alert('搜索框内容不能为空','position_list.php');
                        }
                        $sql="select * from position where position_name like '%".$position_name."%'  order by id";
                        $rs = mysqli_query($conn,$sql);
                        if($row=mysqli_num_rows($rs)<1){
                            alert('未检索到相关结果','position_list.php');
                        }
                        if($rs){
                            while ($rows = mysqli_fetch_assoc($rs)){
                                echo '<tr>';
                                echo '<td>'.$rows['id'].'</td>';
                                echo '<td>'.$rows['position_name'].'</td>';
                                echo '<td>'.$rows['position_other'].'</td>';
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
                                        window.location.href="position_delete.php?id="+arr[0];
                                    })
                                }else if(eventName=='edit'){
                                    //修改
                                    window.location.href="position_edit.php?id="+arr[0];
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