<!DOCTYPE html>
<html lang="zh-tw" itemtype="http://schema.org/WebPage">
<head>
	<meta charset="utf-8">
 	<title>
		<?php 
			if (!empty($is_blog)) :
				echo $CI->fuel_blog->page_title($page_title, ' : ', 'right');
			else:
				echo fuel_var('page_title', '');
			endif;

            $t = date("YmdHis");
		?>
	</title>
    <link rel="icon" href="<?php echo site_url()?>favicon.ico" type="image/x-icon">
	<meta name="keywords" content="<?php echo fuel_var('meta_keywords')?>">
	<meta name="description" content="<?php echo fuel_var('meta_description')?>">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo fuel_var('og_title')?>"/>
    <meta property="og:image" content="<?php echo fuel_var('og_image')?>"/>
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="180" />
    <meta property="og:image:height" content="180" />
    <meta property="og:site_name" content="<?php echo fuel_var('page_title')?>"/>
    <meta property="og:description" content="<?php echo fuel_var('og_desc')?>">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <link href="<?php echo site_url()?>assets/css/flat_css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo site_url()?>assets/css/flat_css/theme.css" rel="stylesheet">
    <link href="<?php echo site_url()?>assets/css/flat_css/bootstrap-reset.css?t=<?=$t?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo site_url()?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo site_url()?>assets/css/flat_css/flexslider.css"/>
    <link href="<?php echo site_url()?>assets/lib/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="<?php echo site_url()?>assets/lib/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?=site_url()?>assets/lib/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="<?=site_url()?>assets/lib/revolution_slider/rs-plugin/css/settings.css" media="screen">

    <!-- Custom styles for this template -->
    <link href="<?php echo site_url()?>assets/css/flat_css/style.css?t=<?=$t?>" rel="stylesheet">
    <link href="<?php echo site_url()?>assets/css/flat_css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo site_url()?>assets/css/bootstrap-select.min.css" rel="stylesheet" />

    <script src="<?php echo site_url()?>assets/flat_js/jquery.js"></script>
    <script src="<?php echo site_url()?>assets/flat_js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo site_url()?>assets/flat_js/bootstrap.min.js"></script>
	<?php
		//echo css('main').css($css);
		if (!empty($is_blog)):
			echo $CI->fuel_blog->header();
		endif;
	?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-48867783-1', '9icase.com');
      ga('send', 'pageview');

    </script>
    <div id="fb-root"></div>
    <script>
        var fb_app_id = '584027658345316';
        var base_url = '<?php echo site_url()?>';
        window.fbAsyncInit = function() {
        FB.init({
                appId      : fb_app_id,
                channelUrl : "<?php echo site_url().'js/channel.html';?>", // Channel File
                status     : true, // check login status
                cookie     : true, // enable cookies to allow the server to access the session
                xfbml      : false  // parse XFBML
            });
        };

        (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1&appId="+fb_app_id;
         fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
    <?php
        $slug = uri_segment(1);

        if(!isset($page_id))
        {
            $page_id = 0;
        }
    ?>
    
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url()?>">9i<span>Case</span></a>
                </div>
                <div class="navbar-collapse collapse front-notify-row">
                    <ul class="nav navbar-nav">
                        <li <?php if(empty($slug)):?> class="active"<?php endif;?>><a href="<?= site_url()?>">首頁</a></li>
                        <li <?php if($slug == "qa"):?> class="active"<?php endif;?>><a href="<?= site_url().'qa'?>">Q&A</a></li>
                        <li <?php if($page_id == 3):?> class="active"<?php endif;?>><a href="<?= site_url()?>case">找案子</a></li>
                    <?php
                        if(isset($this->fuel_auth)):
                            $user = $this->fuel_auth->valid_user();
                            if(!empty($user) AND !empty($user['user_name'])):
                    ?>
                                <li <?php if($page_id == 7):?> class="active"<?php endif;?>><a href="<?= site_url()?>member">會員中心<span class="badge bg-info msgNotify">0</span></a></li>
                                <li id="LogoutLi"><a href="<?= site_url()?>logout">登出</a></li>
                            
                            <?php else:?>
                                <li <?php if($page_id == 6):?> class="active"<?php endif;?>><a href="<?= site_url()?>login">登入</a></li>
                            <?php endif;?>
                    <?php 
                        elseif(isset($CI->fuel_auth)):
                            $user = $CI->fuel_auth->valid_user();
                            if(!empty($user) AND !empty($user['id'])):
                    ?>
                            <li <?php if($page_id == 7):?> class="active"<?php endif;?>><a href="<?= site_url()?>member">會員中心<span class="badge bg-info msgNotify">0</span></a></li>
                            <li id="LogoutLi"><a href="<?= site_url()?>logout">登出</a></li> 
                            <?php else:?>
                                <li <?php if($page_id == 6):?> class="active"<?php endif;?>><a href="<?= site_url()?>login">登入</a></li>
                            <?php endif;?> 
                    <?php endif;?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="windows8" style="margin: 0 auto; position: absolute; z-index:99; opacity: 0; top:50%; left: 50%;">
        處理中.....
        <div class="wBall" id="wBall_1">
        <div class="wInnerBall">
        </div>
        </div>
        <div class="wBall" id="wBall_2">
        <div class="wInnerBall">
        </div>
        </div>
        <div class="wBall" id="wBall_3">
        <div class="wInnerBall">
        </div>
        </div>
        <div class="wBall" id="wBall_4">
        <div class="wInnerBall">
        </div>
        </div>
        <div class="wBall" id="wBall_5">
        <div class="wInnerBall">
        </div>
        </div>
    </div>
    <div id="blackBG"></div>
    <div style="width: 480px; height: 400px; background: #fff; border: #dfdfdf 1px solid; position: absolute; left: 25%; top: 25%; z-index:99; display:none" id="div_fan">
        <div style="width: 410px; margin: 0 auto; font-size: 14px; font-weight: bold; color: #333;">
        為了讓我們提供更好的服務，請支持我們，請先加入粉絲團：
            <div id="like_box" style="margin: 5px auto;"><iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/9icase&amp;width=410&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=350" scrolling="no" frameborder="0" style="border: none; overflow: hidden; width: 410px; height: 350px;" allowTransparency="true"></iframe></div>
        </div>
    </div>