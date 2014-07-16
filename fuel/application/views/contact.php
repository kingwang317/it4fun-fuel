<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>Young Talent - 聯絡我們</title>    
    <meta property="og:title" content="Young Talent - 聯絡我們" />
    <meta property="og:description" content="年輕，就是你的優勢！我們是專屬於學生的工作職缺網站！累積工作經驗，從現在開始。我們有經過認證的工作職缺，把關的安全工作環境讓你的起步就是比別人快！" />
    <meta property="og:url" content="<?php echo site_url()?>" />
    <meta property="og:image" content="<?php echo site_url()?>assets/templates/images/pic/og_image.jpg" />   
    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/contact.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/contact.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php $this->load->view('_blocks/_header')?>
            <div id="bodybox01">
                <img src="<?php echo site_url()?>assets/templates/images/pic/pic8.png">
            </div>
            <div id="bodybox02">
                <form>
                <p class="title">聯絡我們</p>
                <p class="desc">如果您有任何聯絡事項，歡迎使用下列表單聯絡我們。</p>
                    <div class="item">
                        <div class="ll">稱呼</div>
                        <div class="rr"><input type="text" name="name" class="name"></div>
                    </div>
                    <div class="item">
                        <div class="ll">EMAIL</div>
                        <div class="rr"><input type="text" name="mial" class="mail"></div>
                    </div>
                    <div class="item">
                        <div class="ll">聯絡電話</div>
                        <div class="rr"><input type="text" name="phone" class="phone"></div>
                    </div>
                    <div class="item item4">
                        <div class="ll">聯絡內容</div>
                        <div class="rr">
                            <textarea></textarea>
                        </div>
                    </div>
                    <div class="item">
                        <div class="ll">驗證碼</div>
                        <div class="rr"><input type="text" name="verificationcode" class="verificationcode"></div>
                    </div>
                    <div class="item">
                        <div class="ll">&nbsp;</div>
                        <div class="rr"><input type="submit" name="submit" class="submit"></div>
                    </div>
                    </form>
            </div>
            <div id="bodybox03">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
        </div>
        <?php $this->load->view('_blocks/_footer')?>
    </div>
    <!-- *** -->
    <div id="wall"></div>
</body>
</html>

