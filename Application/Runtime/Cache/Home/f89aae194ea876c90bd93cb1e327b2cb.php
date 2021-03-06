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
	<style>
    .mark-time{
        font-size: x-small;
    }
    .message-container{
        height: 600px;
        padding-top: 100px;
    }
</style>
<div class="message-container">
    <div class="books-articles">
        <div class="row">
            <div class="col-xs-6 .col-md-6 ">
                <?php if(is_array($getMails)): $i = 0; $__LIST__ = $getMails;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gmail): $mod = ($i % 2 );++$i;?><div class="panel panel-info" >
                        <div class="panel-heading inline">
                        <span>
                            来自 <a class="fromuser" href=""><?php echo ($gmail['fromname']); ?></a>
                        </span>
                            <button data-id="<?php echo ($gmail['id']); ?>" type="button" class="close pull-right delfrom"
                                    aria-hidden="true">
                                &times;
                            </button>
                            <button data-from="<?php echo ($gmail['fromid']); ?>" class="btn btn-xs btn-default pull-right callback" data-toggle="modal"
                                    data-target="#backwords">回复</button>
                        </div>
                        <div class="panel-body">
                            <?php echo ($gmail['content']); ?>
                            <br>
                            <p class="mark-time pull-right"><?php echo ($gmail['ctime']); ?></p>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="col-xs-6 .col-md-6">
                <?php if(is_array($sentMails)): $i = 0; $__LIST__ = $sentMails;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$smail): $mod = ($i % 2 );++$i;?><div class="panel panel-default">
                        <div class="panel-heading">
                       <span>
                            寄给 <a class="fromuser" href=""><?php echo ($smail['toname']); ?></a>
                        </span>
                            <button data-id="<?php echo ($smail['id']); ?>" type="button" class="close pull-right delto"
                                    aria-hidden="true">
                                &times;
                            </button>
                        </div>
                        <div class="panel-body">
                            <?php echo ($smail['content']); ?>
                            <br>
                            <p class="mark-time pull-right"><?php echo ($gmail['ctime']); ?></p>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="backwords" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    回信给: <span id="sendtouser"></span>
                </h4>
            </div>
            <div class="modal-body">
                <textarea class="form-control" name="" id="message" cols="78" rows="5" onkeyup="words_deal();" ></textarea>
            </div>
            <div class="modal-footer">
                <span id="text-count" class="pull-left text-muted"></span>
                <button type="button" class="btn btn-primary" id="sentit">
                    biu~
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<script>

    $(function(){
        var fromuser;
        $(".callback").click(function(){
            var from = $(this).parent().find('.fromuser')[0];
            $("#backwords").find("#sendtouser").html($(from).clone());
            $("#sentit").show();
            $("#message").val('');
            fromuser = $(this).data('from');
        });
        $("#sentit").click(function(){
            var mail = $("#message").val();
            var $mailer = $(this);
            if(mail.length == 0){
                $("#text-count").text("你在逗我啊!要我跑去送一个空信件,多累啊");
                return;
            }
            if(fromuser ==''){
                $("#text-count").text("好像出了点错误,我找不到收信人的邮箱,抱歉-.-!");
                return;
            }
            $.ajax({
                type:"POST",
                url:'<?php echo U("Message/booksmail");?>',
                data:{
                    mail:mail,
                    touserid:fromuser
                },
                dataType:"json"
            }).done(function(data){
                if(data.code == 1){
                    $mailer.hide();
                }
                $("#text-count").text(data.name);
            });
        });

        $(".delto").click(function(){
            var id = $(this).data("id");
            var $parent = $(this).parent().parent();
            delMessage(id,'to',$parent);
        });
        $(".delfrom").click(function(){
            var id = $(this).data("id");
            var $parent = $(this).parent().parent();
            delMessage(id,'from',$parent);
        });
    });

    function delMessage(id,type,$parent){
        console.log(id);
        var outcome = false;
        $.ajax({
            type:"POST",
            url:'<?php echo U("Message/delMessage");?>',
            data:{
                id:id,
                type:type
            },
            dataType:"json"
        }).done(function(data){
            if(data['code'] == 1){
                outcome = true;
                $parent.remove();
            }else{
                alert(data['name']);
            }
        });
    }

    function words_deal()
    {
        var curLength=$("#message").val().length;
        if(curLength>140)
        {
            var num=$("#message").val().substr(0,140);
            $("#message").val(num);
            $("#text-count").text("超过字数限制，多出的字将被截断！" );
        }
        else
        {
            $("#text-count").text("还可以输入:"+(140-$("#message").val().length)+'字符');
        }
    }
            $(document).ready(function() {
                    $.post('<?php echo U("Message/openMails");?>',{
                    },function(data){
                    });
            });
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