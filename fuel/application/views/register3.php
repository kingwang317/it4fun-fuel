<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>YoungTalent - 註冊步驟3</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/register3.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/register3.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script>
    <!-- Facebook Conversion Code for 註冊 -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6016713470119', {'value':'1.00','currency':'TWD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6016713470119&amp;cd[value]=1.00&amp;cd[currency]=TWD&amp;noscript=1" /></noscript>
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php $this->load->view('_blocks/_header')?>
            <div id="editbox">
                <div class="step3"></div>
                <div class="center">
                    <div class="ok">
                        <div class="icon"><img src="<?php echo site_url()?>assets/templates/images/icon/icon16.png"></div>
                        <?php echo fuel_block("register3") ?>
                        <a style="text-decoration:none" href="<?php echo site_url()?>/user/myinfo?account=<?php echo $account ?>"><div class="showbtn">查看資料</div></a>
                    </div>
                    
                </div>
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
        </div>
        <?php $this->load->view('_blocks/_footer')?>
    </div>
</body>
</html>

