<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\xampp\htdocs\QandA\public/../application/index\view\login\change_pwd.html";i:1504237617;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>答题系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo \think\Config::get('web_res_root'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo \think\Config::get('web_res_root'); ?>/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('web_res_root'); ?>/css/planeui.min.css" />
</head>
<body>
<div  class="pui-layout">
    <header>
        <div style="position: relative;">
            <img src="<?php echo \think\Config::get('web_res_root'); ?>/img/header2.jpg" style="width: 100%;height: auto">
        </div>
    </header>
</div> 
    <form class="pui-form pui-input-sm-large pui-input-md-small pui-grid"  id="login_form" method="post">
        <h3 style="text-align: left">修改密码</h3>
        <hr>
        <div class="pui-row pui-form-group pui-form-group-underline-dashed">
            <label>原密码</label>
            <input type="password" id="old_password" name="old_password"/>
        </div>
        <div class="pui-row pui-form-group pui-form-group-underline-dashed">
            <label>新密码</label>
            <input type="password" minlength="8" maxlength="20" id="new_password" name="new_password"/>
        </div>
        <div class="pui-row pui-form-group pui-form-group-underline-dashed">
            <label>新密码确认</label>
            <input type="password" minlength="8" maxlength="20" id="new_password_again" name="new_password_again"/>
        </div>
        <div class="pui-row pui-form-group pui-form-group-underline-dashed">
            <button id="change_pwd__btn" class="pui-btn pui-btn-small pui-btn-primary ">确认修改</button>
            <a class="pui-btn pui-btn-small pui-btn-default " href="<?php echo url('index/userindex/user_index'); ?>">返回</a>
        </div>
    </form>
</body>
<!-- jQuery -->
<script src="<?php echo \think\Config::get('web_res_root'); ?>/js/jquery.min.js"></script>
<script src="<?php echo \think\Config::get('web_res_root'); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo \think\Config::get('web_res_root'); ?>/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("#change_pwd__btn").click(function(){
        var old_password = $("#old_password").val();
        var new_password = $("#new_password").val();
        var new_password_again = $("#new_password_again").val();

        //验证两次新密码输入是否相同
        if(new_password!=new_password_again){
            alert("两次密码不相同，请重新输入");
        }else{
            var post_data = {old_password:old_password,new_password:new_password};
            $.ajax({
                url:"<?php echo url('index/login/change_pwd_post'); ?>",
                dataType: "json",
                type: 'POST',
                data: post_data,
                async: false,
                success: function(data){
                    json_data=eval('('+data+')');
                    alert(json_data['result']);
                    window.location.href="<?php echo url('login/index'); ?>"
                },
                error: function(data, status, error){
                    alert("跳转失败");
                    alert(error);
                }
            });
        }
        return false;
    });
});

</script>

</html>
