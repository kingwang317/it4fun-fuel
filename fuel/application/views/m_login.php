<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/css/signing.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/signing.js"></script>
</head>

<body>
    <div id="maincontain">        
        <div id="textbox">
            <form>
                <p class="title">登入帳號</p>  
                <p class="line"></p>

                <p class="name">電子郵件</p>
                <input type="text" class="mail" >
                <span class="ok"><img src="<?php echo site_url()?>assets/mobile_template/images/icon/ok.png"></span>

                <p class="name">密碼</p>
                <input type="password" class="passwd1" >


                <input type="submit" class="submit" value="登入">
            </form>
            <p class="or">或是</p>
            <p class="fbtxt">使用臉書帳號登入，又快又方便</p>

            <a id="fbbtn"></a>
        </div>
        <?php $this->load->view('_blocks/_m_footer')?>
    </div>
    <div id="header">
        <div id="logo"></div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

