<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/index.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="homebox">
            <div class="bannerbox"></div>
            <a class="loginbtn" href="<?php echo site_url()?>home/login"><img src="<?php echo site_url()?>assets/mobile_template/images/btn/btn4.png"><a>
            <a class="RequestAnAccount" href="<?php echo site_url()?>register/index">申請帳號</a>
            <ul class="logobox">
                <?php echo fuel_block("m_index_logobox") ?>
            </ul>

        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

