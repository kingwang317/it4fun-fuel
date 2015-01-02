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
        <div id="myactivitybox">     
            <h2 class="titlebox">我參加的活動</h2>       
            <ul>
                <li>
                    <div class="activitybox">
                        <a href="#"><img src="images/pic/pic2.png"></a>
                        <p>通往職場的早鳥"獵"車：藥廠以及醫材業 </p>
                        <p>2014/09/26 16:00</p>
                    </div>
                </li>

                <li>
                    <div class="activitybox">
                        <a href="#"><img src="images/pic/pic2.png"></a>
                        <p>通往職場的早鳥"獵"車：藥廠以及醫材業 </p>
                        <p>2014/09/26 16:00</p>
                    </div>
                </li>                                
            </ul>
            <div class="line"></div>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

