<?php
include ('head.php');
limits('分类管理');
?>
    <div class="layui-body">
        <!-- 分类管理-新增分类信息 -->
        <div style="padding: 15px;">
            <h2>分类管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li><a href="assort_list.php">分类列表</a></li>
                    <li class="layui-this">新增分类</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md6">
                            <form class="layui-form" method="post" action="assort_save.php">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">分类名称*</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="assort_name" required lay-verify="required" class="layui-input">
                                    </div>                                    
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">分类说明</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="other" class="layui-input">
                                    </div>
                                </div>
                                 <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <input type="submit" class="layui-btn layui-btn-normal" value="立即提交">
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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
