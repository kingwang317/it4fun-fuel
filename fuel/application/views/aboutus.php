<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>Young Talent - 關於我們</title>    
    <meta property="og:title" content="Young Talent - 關於我們" />
    <meta property="og:description" content="年輕，就是你的優勢！我們是專屬於學生的工作職缺網站！累積工作經驗，從現在開始。我們有經過認證的工作職缺，把關的安全工作環境讓你的起步就是比別人快！" />
    <meta property="og:url" content="<?php echo site_url()?>" />
    <meta property="og:image" content="<?php echo site_url()?>assets/templates/images/pic/og_image.jpg" />   
    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/about.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/about.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php $this->load->view('_blocks/_header')?>
            <!--
            <div id="bodybox01">
                <img src="<?php echo site_url()?>assets/templates/images/pic/pic11.png">
            </div>
        -->
            <div id="bodybox02">
                <p class="title">About Young Talent</p>
                <p class="content">
                    我們是專門為年輕人設立的找工作平台<br/>
                    擔心因為年紀輕，經歷少就在求職路上處處碰壁? <br/>
                    年輕，其實就是你的優勢!<br/>
                    在Young Talent，年輕的你就是我們的主力戰將。<br/>
                </p>
                <p class="content">
                    我們是由資深人力資源團隊及數家國際級人力資源顧問公司共同建置之平台，<br/>
                    與年輕的學生團隊聯合執行管理。<br/>
                    在Young Talent的團隊中，我們重視年輕人的價值，同時強調創意的執行。<br/>
                    我們比其他人懂你們求職的需求以及對未來的期待!<br/>
                </p>  

                <p class="content">
                    提早加入我們，登錄你的簡歷，提早替你的履歷加分!<br/>
                    在Young Talent你可以收到豐富的職缺訊息，職場趨勢。<br/>
                    我們不定期舉辦各式活動，<br/>
                    讓新鮮人保持新鮮，履歷、經歷、腦袋卻絕不陽春!<br/>
                </p>  

                <p class="title">如何使用Young Talent網站</p>
                <p class="content">
                    請先登錄你的基本資料。<br/>
                    在別的網站，你只能苦苦等待應徵職缺的公司回覆你。<br/>
                    在Young Talent，我們的顧問會先定位適合你的職缺，接著主動聯繫你。<br/>
                    我們為你分析職缺優劣，分享不同職缺可以學習到的技能。<br/>
                    在Young Talent，我們讓你 優雅 從容 快速 地進入職場!<br/>
                </p>
                <br/><br/><br/>
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

