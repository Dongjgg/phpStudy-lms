<?php
include ('head.php');
limits('用户管理');
?>
    <div class="layui-body">
        <!-- 用户管理-新增用户信息 -->
        <div style="padding: 15px;">
            <h2>用户管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li><a href="user_list.php">用户列表</a></li>
                    <li class="layui-this">新增用户</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-row">
                        <div class="layui-col-md6">
                            <form class="layui-form" method="post" action="user_save.php">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">用户名称*</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="username" required lay-verify="required" class="layui-input">
                                    </div>                                    
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">登陆密码*</label>
                                    <div class="layui-input-block">
                                        <input type="password" name="password1" required lay-verify="required" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">再次输入密码*</label>
                                    <div class="layui-input-block">
                                        <input type="password" name="password2" required lay-verify="required" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">真实姓名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="real_name" class="layui-input">
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
