<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title><?php echo ($title); ?></title>
		<link href="/graduationproject/Public/dist/css/bootstrap.css" rel="stylesheet">
	<script src="/graduationproject/Public/js/jquery-2.1.1.js" type="text/javascript"></script>


	<style type="text/css">
		body {
		  padding-top: 70px;
		}

		.theme-dropdown .dropdown-menu {
		  position: static;
		  display: block;
		  margin-bottom: 20px;
		}

		.theme-showcase{
			padding-bottom: 50px;
		}

		.theme-showcase > p > .btn {
		  margin: 5px 0;
		}

		.theme-showcase .navbar .container {
		  width: auto;
		}

		.footer {
		  /*position: absolute;*/
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  height: 60px;
		  background-color: #f5f5f5;
		}
	</style>
</head>
<body role="document">
	<style type="text/css">
    #head-img{
    	width: 40px;
    	height: 40px;
      background-repeat: round;
	    display: block;
    }
    #head-a-img {
	    padding: 1px 10px;
    }
    .nav a {
    	margin-top: 15px;
    }
    #u-message{
      padding: 0px;
    }
    .navbar-brand{
      font-size: 30px;
    }
    </style>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">WEN DI</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('Nation/index');?>" style="color:white">WEN DI</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="<?php echo U('Nation/index');?>" class="active">HOME</a></li>
			<li><a href='<?php echo U("Articles/index");?>'>好文</a></li>
			<!-- <li><a href="#">附近的人</a></li> -->
			<li><a href='<?php echo U("Books/donateBooks");?>'>发布图书</a></li>
			<li><a href='<?php echo U("Articles/writeArticle");?>'>发布文章</a></li>
			<?php if(!empty($userInfo)): ?><li> 
					<!-- style="padding-top:10px;" -->
					<a  id="head-a-img" href='/graduationproject/index.php/home/user/user/userid/<?php echo ($userInfo["userid"]); ?>.html'>
            <!-- <?php if(!empty($userInfo["headerimage"])): ?><div id="head-img" style="background-image:url('<?php echo ($userImgInfo["imgurl"]); ?>')"></div>  
                <?php else: ?>            
                 <img id="head-img" src="/graduationproject/Public/img/bg.jpg"><?php endif; ?> -->

                <?php if(!empty($userImgInfo)): ?><img  id="head-img" src="/graduationproject/Public/Uploads/Users/<?php echo ($userImgInfo); ?>">
                  <?php else: ?>
                  <img id="head-img" src="/graduationproject/Public/img/default.gif"><?php endif; ?>
                    </a>
					<!-- U('Blog/cate','cate_id=1&status=1') -->
                </li>
                <li>
                    <a href='<?php echo U("User/myMailBox");?>'><span class="badge"><?php echo ($messagenum); ?></span> </a>
                </li>
				<li><a id="log_out">退出</a></li>
			<?php else: ?>
				<li><a href="<?php echo U('Login/login');?>">SignIn/SignUp</a></li><?php endif; ?>
            <!-- <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<script>
	$(function(){
        $("li").find("#log_out").click(function(){
            $.post('<?php echo U("Login/logOut");?>',{
            },function(data){
                location.href='<?php echo U("User/myMailBox");?>';
            });
        });
	})
</script>		

	<div class="container theme-showcase" role="main" style=”clear:both;”>
	<style type="text/css">
	.wen-forgot{
		margin-top: 20%;
		margin-bottom: 20%;
		width: 40%;
	}
	@media (max-width: 600px) {
		.wen-forgot{
			margin-top: 20%;
			margin-bottom: 80%;
			width: 100%;
		}
	}
	.wen-forgot>input{
		margin-bottom: 4px;
	}
</style>


	<div class="wen-forgot center-block">
		<input class="form-control" id="email" type="text" placeholder="请输入注册时的email地址">
		<input class="form-control hidden" id="password" type="text" placeholder="请输入新密码" >
		<input class="form-control hidden" id="code" type="text" placeholder="请输入wendi寄给你的验证码">
		<button class="btn btn-success form-control hidden" id="sub-changePass" >更改密码</button>
		<button class="btn btn-primary form-control" id="sent-checkcode">发送验证码</button>
	</div>

<script type="text/javascript">
	$(function () {
		$("#sub-changePass").click(function(){
			var password = $("#password").val();
			password = password.replace(/\s+/g,"");
			var email = deleteEmptyStr($("#email").val());
			var code = deleteEmptyStr($("#code").val());
			
			if(password =="" || email=="" || code ==""){
				alert('请将信息填写完整');
				return ;
			}
			if(!checkemail(email)){
				alert('电子邮件填写不正确');
				return ;
			}
			$.ajax({
				type:"POST",
				url:'<?php echo U("Login/changPasswordByForgot");?>',
				data:{
					email:email,
					password:password,
					code:code
				},
				dataType:'json'
			}).done(function(data){
				alert(data.name);
				if(data.code ==1){
					location.href = '<?php echo U("Login/login");?>';
				}
			});
		});
		$("#sent-checkcode").click(function(){
			var email = deleteEmptyStr($("#email").val());
			if(!checkemail(email)){
				alert('电子邮件填写不正确');
				return ;
			}
			$.ajax({
				type:"POST",
				url:'<?php echo U("Login/sentChangePasswordCode");?>',
				data:{
					email:email,
				},
				dataType:'json'
			}).done(function(data){
				alert(data.name);
				if(data.code == 1){
					$("#sent-checkcode").remove();
					$("#password").removeClass('hidden');
					$("#code").removeClass('hidden');
					$("#sub-changePass").removeClass('hidden');
				}
			});
		});
	});
//判断邮箱格式是否合格
    function checkemail(email) { var obj = new RegExp("^[0-9a-zA-Z][_.0-9a-zA-Z-]{0,31}@([0-9a-zA-Z][0-9a-zA-Z-]{0,30}[0-9a-zA-Z]\.){1,4}[a-z]{2,4}$"); return obj.test(email); }

    function deleteEmptyStr(str){
      str = str.replace(/\s+/g,"");
      return str;
    }
</script>


	</div>
	<style type="text/css">
.footer-content{
	text-align: center;
	padding-bottom: 20px;
	padding-top: 10px;
}



</style>
    <style type="text/css"></style>
    <footer class="footer" style="height:auto">
      <div class="footer-content">
        <p class="text-muted center-block">National Library 是有许广保搭建</p>
        <p class="text-muted center-block">感谢<a href="http://www.bootcss.com/" target="_blank">Bootstrap</a>,感谢<a href="http://www.thinkphp.cn/" target="_blank">ThinkPHP</a>,感谢 
          <a href="https://www.apachefriends.org/zh_cn/index.html" target="_blank">Xampp</a>,感谢<a href="https://jquery.com/" target="_blank">jQuery</a>,等免费开源项目支持</p>	
       	<a href="">关于我AboutMe</a>
      </div>
    </footer>
	    <script src="/graduationproject/Public/dist/js/bootstrap.min.js"></script>
    <script>

        var totalDistance = 0.0;
        var lastLat;
        var lastLong;

//        function toRadians(degree) {
//            return this * Math.PI / 180;
//        }

//        function distance(latitude1, longitude1, latitude2, longitude2) {
//            // R是地球半径（KM）
//            var R = 6371;
//
//            var deltaLatitude = toRadians(latitude2-latitude1);
//            var deltaLongitude = toRadians(longitude2-longitude1);
//            latitude1 = toRadians(latitude1);
//            latitude2 = toRadians(latitude2);
//
//            var a = Math.sin(deltaLatitude/2) *
//                    Math.sin(deltaLatitude/2) +
//                    Math.cos(latitude1) *
//                    Math.cos(latitude2) *
//                    Math.sin(deltaLongitude/2) *
//                    Math.sin(deltaLongitude/2);
//
//            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
//            var d = R * c;
//            return d;
//        }

        function updateStatus(message) {
//            document.getElementById("location-status").innerHTML = message;
            $("#location-status").html(message);
//            alert('没有成功获取地址');
        }

        function loadlocation() {
            if(navigator.geolocation) {
                updateStatus("浏览器支持HTML5 Geolocation。");
                navigator.geolocation.watchPosition(updateLocation, handleLocationError, {maximumAge:20000});
//                navigator.geolocation.getCurrentPosition(updateLocation, handleLocationError, {maximumAge:20000});
//                getCurrentPosition
            }
        }

        function updateLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var accuracy = position.coords.accuracy;

//            document.getElementById("latitude").innerHTML = latitude;
//            document.getElementById("longitude").innerHTML = longitude;
//            document.getElementById("accuracy").innerHTML = accuracy;
            console.log(latitude,longitude,accuracy);
            // 如果accuracy的值太大，我们认为它不准确，不用它计算距离
//            if (accuracy >= 500) {
//                updateStatus("这个数据太不靠谱，需要更准确的数据来计算本次移动距离。");
//                return;
//            }
//
//            // 计算移动距离
//
//            if ((lastLat != null) && (lastLong != null)) {
//                var currentDistance = distance(latitude, longitude, lastLat, lastLong);
//                document.getElementById("currDist").innerHTML =
//                        "本次移动距离：" + currentDistance.toFixed(4) + " 千米";
//
//                totalDistance += currentDistance;
//
//                document.getElementById("totalDist").innerHTML =
//                        "总计移动距离：" + currentDistance.toFixed(4) + " 千米";
//            }

            lastLat = latitude;
            lastLong = longitude;

            updateStatus("计算移动距离成功。lat/lng"+lastLat+"/"+lastLong);
        }

        function handleLocationError(error) {
            switch(error.code)
            {
                case 0:
                    updateStatus("尝试获取您的位置信息时发生错误：" + error.message);
                    break;
                case 1:
                    updateStatus("用户拒绝了获取位置信息请求。");
                    break;
                case 2:
                    updateStatus("浏览器无法获取您的位置信息：" + error.message);
                    break;
                case 3:
                    updateStatus("获取您位置信息超时。");
                    break;
            }
        }

//        $(document).ready(function() {
//            loadlocation();
//        });
    </script>
</body>
</html>