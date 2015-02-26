<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>YoungTalent - 我的資訊</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/index.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="navbox">
            <table>
                <tr>
                    <td><a href="<?php echo site_url()?>user/mynews"><img src="<?php echo site_url()?>assets/mobile_template/images/btn/home/btn1.png"></a></td>
                    <td><a href="<?php echo site_url()?>user/editinfo"><img src="<?php echo site_url()?>assets/mobile_template/images/btn/home/btn2.png"></a></td>
                </tr>
                <tr>
                    <td><div class="msgbox"><?php echo $notice_count ?></div><a href="<?php echo site_url()?>notices"><img src="<?php echo site_url()?>assets/mobile_template/images/btn/home/btn3.png"></a></td>
                    <td><a href="<?php echo site_url()?>job"><img src="<?php echo site_url()?>assets/mobile_template/images/btn/home/btn4.png"></a></td>
                </tr>
                <tr>
                    <td><a href="<?php echo site_url()?>event"><img src="<?php echo site_url()?>assets/mobile_template/images/btn/home/btn5.png"></a></td>
                    <td><a href="<?php echo site_url()?>/user/myrecord"><img src="<?php echo site_url()?>assets/mobile_template/images/btn/home/btn6.png"></a></td>
                </tr>
            </table>
        </div>
    </div>
    <div id="headerbox">
        <?php $this->load->view('_blocks/_m_menu')?>
    </div>    
</body>
</html>

