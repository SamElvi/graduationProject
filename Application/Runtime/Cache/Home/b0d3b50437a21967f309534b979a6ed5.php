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
	/*
	 * Masthead for nav
	 */

	.blog-masthead {
	  background-color: #428bca;
	  -webkit-box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
	          box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
	}

	/* Nav links */
	.blog-nav-item {
	  position: relative;
	  display: inline-block;
	  padding: 10px;
	  font-weight: 500;
	  color: #cdddeb;
	}
	.blog-nav-item:hover,
	.blog-nav-item:focus {
	  color: #fff;
	  text-decoration: none;
	}

	/* Active state gets a caret at the bottom */
	.blog-nav .active {
	  color: #fff;
	}
	.blog-nav .active:after {
	  position: absolute;
	  bottom: 0;
	  left: 50%;
	  width: 0;
	  height: 0;
	  margin-left: -5px;
	  vertical-align: middle;
	  content: " ";
	  border-right: 5px solid transparent;
	  border-bottom: 5px solid;
	  border-left: 5px solid transparent;
	}

	.myspace{
		margin-top: 20px;
		/*font-size: 20px;*/
		margin-bottom: 100px;
	}

	.my-head {
		text-align: center;
	}

	.sys-font-type,.use-font-type{
		font-size: 20px;
	}
	.sys-font-type,.note-font-type{
		color: darkgrey;
	}
	.use-font-type{
		color: ;
	}
	.form-group{
		margin-top: 5px;
		margin-bottom: 0px;
	}
	#userimg { 
		width: 300px;
		height: 300px;
	}

	.space-book-cover{
		height: 50px;
		width: 50px;
	}
</style>
<!-- <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">个人信息</a>
          <a class="blog-nav-item" href="#">我的书架</a>
          <a class="blog-nav-item" href="#">我的文章</a>
          <a class="blog-nav-item" href="#">我的信息
          	<span class="badge">2</span>
          </a>
          <a class="blog-nav-item" href="#">About</a>
        </nav>
      </div>
</div> -->
<div class="myspace">
	<div class="my-head">
		<a id="img_change">
			<!-- <?php if(!empty($userImgInfo["imgurl"])): ?><div class="img-thumbnail"  style="background-repeat: round; background-image:url('<?php echo ($userImgInfo["imgurl"]); ?>')"></div>  
            <?php else: ?>  	          
				<img data-src="holder.js/300x300" class="img-thumbnail" alt="300x300" src="/graduationproject/Public/img/bg.jpg" style="width: 300px; height: 300px;"><?php endif; ?> -->
			<?php if(!empty($my_userinfo["headerimage"])): ?><img  id="userimg" src="/graduationproject/Public/Uploads/Users/<?php echo ($my_userinfo["headerimage"]); ?>">
					<?php else: ?>
					<img style="width:150px;height:150px;" src="/graduationproject/Public/img/default.gif"><?php endif; ?>
		</a>
	</div>
	<hr />
	<div class="form-horizontal " >
        <div class="form-group">
            <label class="col-xs-6 .col-md-4 control-label">ID</label>
            <div class="col-xs-6 .col-md-4 ">
            	<label class="control-label"><?php echo ($my_userinfo["id"]); ?></label>
            </div>
        </div>
        <div class="form-group">
        	<label class="col-xs-6 .col-md-4 control-label">昵称</label>
        	<div class="col-xs-6 .col-md-4 user-name-div">
        		<label class="control-label"><a id="text-username"><?php echo ($my_userinfo["name"]); ?></a></label>
        	</div>
        </div>
        <div class="form-group">
        	<label class="col-xs-6 .col-md-4 control-label">邮箱/帐号</label>
        	<div class="col-xs-6 .col-md-4 user-account-div">
        		<label class="control-label"><a id="text-account"><?php echo ($my_userinfo["email"]); ?></a></label>
        	</div>
        </div>
        <div class="form-group">
        	<label class="col-xs-6 .col-md-4 control-label">个性签名</label>
        	<div class="col-xs-6 .col-md-4 user-introduction-div">
        		<?php if(empty($my_userinfo["selfintroduction"])): ?><label class="control-label"><a id="text-introduction">编辑</a></label>
        		<?php else: ?>
        			<label class="control-label"> <a id="text-introduction"><?php echo ($my_userinfo["selfintroduction"]); ?></a></label><?php endif; ?>
        	</div>
        </div>
        <div class="form-group">
            <label class="col-xs-6 .col-md-4 control-label">藏书量</label>
            <div class="col-xs-6 .col-md-4">
        		<?php if(($my_userinfo["books"] != 0)): ?><label class="control-label"><?php echo ($my_userinfo["books"]); ?></label>
            	<?php else: ?>
            		<label class="control-label"><a href="<?php echo U("Books/donateBooks");?>">发布图书</a></label><?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-6 .col-md-4 control-label">文章</label>
            <div class="col-xs-6 .col-md-4">
            	<?php if(($my_userinfo["articles"] != 0)): ?><label class="control-label"><?php echo ($my_userinfo["articles"]); ?></label>
            	<?php else: ?>
            		<label class="control-label"><a href="<?php echo U('Articles/writearticle');?>">发布文章</a></label><?php endif; ?>
            </div>
        </div>
    </div>

	<hr />
	<div class="books-articles">
		<div class="row">
			<div class="col-xs-6 .col-md-6 ">
				<?php if(is_array($mybooks)): $i = 0; $__LIST__ = $mybooks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book): $mod = ($i % 2 );++$i;?><div class="well" id="<?php echo ($book['id']); ?>">
						<img class="space-book-cover" src="/graduationproject/Public/Uploads/Books/<?php echo ($book['cover']); ?>">
						<a href="<?php echo ($book['uri']); ?>" target="_blank"><label>《<?php echo ($book['title']); ?>》发布时间：<?php echo ($book['ctime']); ?></label></a>
						<button class="btn btn-danger btn-xs deleteBook">删除</button>
						<a href="<?php echo ($book['alterUri']); ?>" class="btn btn-info btn-xs" target="_blank">修改</a>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>	
			</div>
			<div class="col-xs-6 .col-md-6"> 
				<?php if(is_array($myarticles)): $i = 0; $__LIST__ = $myarticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article): $mod = ($i % 2 );++$i;?><div class="well" id="<?php echo ($article['id']); ?>">
						<a href="<?php echo ($article['uri']); ?>" target="_blank">
							《<?php echo ($article['title']); ?>》
						</a>
						<button class="deleteArticle btn btn-danger btn-xs">删除</button>
						<a href="<?php echo ($article['alterUri']); ?>" class="btn btn-info btn-xs" target="_blank">修改</a>
						<p class="text-muted small"> &nbsp;&nbsp;发表时间:<?php echo ($article['ctime']); ?></p>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
	

</div>

					



<script>
	$(function() {
		$(".myspace").find("#img_change").click(function(){
			location.href='<?php echo U("Img/imageUpload");?>';
		});
		$("#text-username").click(function(){

			if($("#text-username").data('alter') === 'on' ){
				$(".save-username-div").remove();
				$("#text-username").data('alter','off');
			}
			else{
				var str = '<div class="form form-inline save-username-div"><input id="new-username" type="text" class="form-control">'
						+'<button id="save-username" class="btn btn-success">保存</button></div>'
				$(".user-name-div").append(str);
				$("#text-username").data('alter','on');
			}
		});

		$(".form-horizontal").delegate('#save-username','click',function(){
			var new_username = deleteEmptyStr($('#new-username').val());
			if(new_username !==''){
				$.post('<?php echo U("User/updateUserName");?>',{
					username:new_username
				},function(data){
					if(data.code ===1){
						$("#text-username").text(new_username);
						$(".save-username-div").remove();
					}else{
						alert(data.name);
						return ;
					}
				});
			}else{
				$(".save-username-div").remove();
				$("#text-username").data('alter','off');
				return;
			}
		});

		$("#text-account").click(function(){
			if($("#text-account").data('alter') === 'on' ){
				$(".save-account-div").remove();
				$("#text-account").data('alter','off');
			}
			else{
				var str = '<div class="form form-inline save-account-div"><input id="new-account" type="text" class="form-control">'
						+'<button id="save-account" class="btn btn-success">保存</button></div>'
				$(".user-account-div").append(str);
				$("#text-account").data('alter','on');
			}
		});

		$(".form-horizontal").delegate('#save-account','click',function(){
			var new_account = deleteEmptyStr($('#new-account').val());
			if(new_account !==''){
				$.post('<?php echo U("User/updateUserAccount");?>',{
					useraccount:new_account
				},function(data){
					if(data.code ===1){
						$("#text-account").text(new_account);
						$(".save-account-div").remove();
					}else{
						alert(data.name);
						return ;
					}
				});
			}else{
				$(".save-account-div").remove();
				$("#text-account").data('alter','off');
				return;
			}
		});

		$("#text-introduction").click(function(){
			if($("#text-introduction").data('alter') === 'on' ){
				$(".save-introduction-div").remove();
				$("#text-introduction").data('alter','off');
			}
			else{
				var str = '<div class="form form-inline save-introduction-div">'
					+'<textarea id="new-introduction" class="form-control"></textarea>'
						+'<button id="save-introduction" class="btn btn-success">保存</button></div>'
				$(".user-introduction-div").append(str);
				$("#text-introduction").data('alter','on');
			}
		});

		$(".form-horizontal").delegate('#save-introduction','click',function(){
			var new_introduction = deleteEmptyStr($('#new-introduction').val());
			if(new_introduction !==''){
				$.post('<?php echo U("User/updateUserIntroduction");?>',{
					userintroduction:new_introduction
				},function(data){
					if(data.code ===1){
						$("#text-introduction").text(new_introduction);
						$(".save-introduction-div").remove();
					}else{
						alert(data.name);
						return ;
					}
				});
			}else{
				$(".save-introduction-div").remove();
				$("#text-introduction").data('alter','off');
				return;
			}
		});

		$(".deleteBook").click(function(){
			$parent = $(this).parent();
			if(confirm('是要删除这本书吗？')){
				$.post('<?php echo U("Books/deleteBook");?>',{
					bookid:$(this).parent().attr('id')
				},function(data){
					if(data['code'] == 1){
						console.log('remove');
						$parent.remove();
					}
					else{
						alert(data['name']);
					}
				});
			}
		});

		$(".deleteArticle").click(function(){
			$parent = $(this).parent();
			if (confirm('是要删除这篇文章吗?')) {
				$.post('<?php echo U("Articles/deleteArticle");?>',{
					'article_id':$(this).parent().attr('id'),
				},function(data){
					if(data['code']==1){
						console.log('remove');
						$parent.remove();
					}else{
						alert(data['name']);
					}
				});
			};
		});

		function deleteEmptyStr(str){
      		str = str.replace(/\s+/g,"");
     	 	return str;
    	}

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