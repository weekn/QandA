<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"G:\xampp\htdocs\QandA\public/../application/index\view\login\index.html";i:1504029673;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
		<meta name="renderer" content="webkit" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="Plane UI" />
    <meta name="keywords" content="Plane UI" />
		<title>Login - 南方基地答题系统</title>

    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('web_res_root'); ?>/css/planeui.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo \think\Config::get('web_res_root'); ?>/css/login/login.css" />


    <style>
            img {
                border-radius: 8px;
            }
            </style>
    </head>
    <!-- style="background:url('<?php echo \think\Config::get('web_res_root'); ?>image/loginbg.jpg')" -->
<body  >
    <a name="top"></a>
    <div class="pui-layout pui-flexbox pui-flex-column login-layout ">
        <div class="pui-layout pui-flex login-main">
            <div class="pui-layout pui-layout-fixed pui-layout-fixed-1200 login-main-con ">
                <div class="login-panel ">
                    <form class="pui-form login-form position" action="dashboard.html" method="post">
                        <div class="pui-form-group">
                            <!-- <h1 class="pui-text-white pui-text-normal">
                                <i class=" pui-text-xxxxxl "></i> 登录 Login
                            </h1> -->
                            <div role="username">
                                <input type="text" id="username" name="username" maxlength="16" class="pui-unbordered" placeholder="用户名" />
                                <i class="fa fa-user pui-text-purple-us"></i>
                            </div>
                        </div>
                        <div class="pui-form-group">
                            <div role="password">
                                <input type="password" id="password" name="password" maxlength="16" class="pui-unbordered" placeholder="密码" />
                                <i class="fa fa-lock pui-text-purple-us"></i>
                            </div>
                        </div>
                        <div class="pui-form-group">
                        </div>
                        <div class="pui-form-group">
                            <input type="submit" id="login_btn" name="submit" class="pui-btn  mybtn" value="登录" />
                            <!-- <input type="submit" name="submit" class="pui-btn pui-btn-default pui-bg-purple-us pui-unbordered" value="忘记密码" /> -->
                        </div>
                    </form>
                    <!-- <h1>hello</h1>

                        本地图片<img src="<?php echo \think\Config::get('web_res_root'); ?>/image/login_bg.jpg" /><br>
                        网络图片<img src="http://i.gtimg.cn/music/photo/mid_album_300/w/x/000mR8hY0Kmwwx.jpg" width="160" class="pui-img-radius box-shadow" /> -->
                </div>
            </div>
        </div>
    </div>


      <!--[if (gte IE 9) | !(IE)]><!-->
  <script type="text/javascript" src="<?php echo \think\Config::get('web_res_root'); ?>/js/jquery-2.1.1.min.js"></script>
      <!--<![endif]-->

  <!--[if lt IE 9]>
  <script type="text/javascript" src="../blog/js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="./../../dist/js/planeui.patch.ie8.js"></script>
  <![endif]-->

  <!--[if lt IE 10]>
  <script type="text/javascript" src="./../../dist/js/planeui.patch.ie9.js"></script>
  <![endif]-->
  <script type="text/javascript" src="<?php echo \think\Config::get('web_res_root'); ?>/js/planeui.js"></script>
</body>

<script type="text/javascript">
$(document).ready(function(){
    $("#login_btn").click(function(){
        var username = $("#username").val();
        var password = $("#password").val();
        if(username == ''){
            alert("用户名不能为空");
        }else if(password == ''){
            alert("密码不能为空");
        }else{
            var post_data = {username:username,password:password};
            $.ajax({
                url:"<?php echo url('index/login/check'); ?>",
                dataType: "json",
                type: 'POST',
                data: post_data,
                async: false,
                success: function(data){
                    json_data=eval('('+data+')');
                    if(json_data['result']=="管理员"){
                        window.location.href="<?php echo url('index/usermanage/user_manage'); ?>";
                    }else if(json_data['result']=="普通用户"){
                        window.location.href="<?php echo url('index/userindex/user_index'); ?>";
                    }else if(json_data['result']=="已登陆"){
                        window.location.href="<?php echo url('index/userindex/user_index'); ?>";
                    }else{
                        alert(json_data['result']);
                        //登录失败操作......
                    }
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
