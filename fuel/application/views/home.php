 <!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>Young Talent - 首頁</title> 
    <meta property="og:title" content="Young Talent - 首頁" />
    <meta property="og:description" content="年輕，就是你的優勢！我們是專屬於學生的工作職缺網站！累積工作經驗，從現在開始。我們有經過認證的工作職缺，把關的安全工作環境讓你的起步就是比別人快！" />
    <meta property="og:url" content="<?php echo site_url()?>" />
    <meta property="og:image" content="<?php echo site_url()?>assets/templates/images/pic/og_image.jpg" />   
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=787884584567146&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script>


</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            
            <?php $this->load->view('_blocks/_header')?>

            <div id="bodybox01" style="display:none">
                <div class="top">
                    <ul>
                        <li class="subject">合作夥伴</li>
                        <li class="logo1"><img src="<?php echo site_url()?>assets/templates/images/company/logo1.png"></li>
                        <li class="logo2"><img src="<?php echo site_url()?>assets/templates/images/company/logo2.png"></li>
                        <li class="logo3"><img src="<?php echo site_url()?>assets/templates/images/company/logo3.png"></li>
                        <li class="logo4"><img src="<?php echo site_url()?>assets/templates/images/company/logo4.png"></li>
                        <li class="logo5"><img src="<?php echo site_url()?>assets/templates/images/company/logo5.png"></li>
                    </ul>
                </div>
                <div class="bottom">
                    <h2>札根青春、成就夢想</h2>
                    <p>
                    問及在過去的工讀經驗中，是否與自已所學有關?59%的受訪者表示並未進入與所學相關的工作領域工讀。但有趣的是詢問他們願意選擇「薪資較高，但與所學關連性較低」的工作，或是選擇「薪資較低，但與所學關連性較高」的工作時，有五成以上的大學生，研究生願意選擇後者，也就是希望能從事「能發揮專長的工讀工作」。針對這項結果，104人力銀行認
                    </p>
                </div>
            </div>
            <div id="bodybox02" style="display:none">
                <img src="<?php echo site_url()?>assets/templates/images/pic/pic1.png">
            </div>
            <div id="bodybox03">
                <img src="<?php echo site_url()?>assets/templates/images/pic/pic2.png">
            </div>
            <div id="bodybox04">
                <p class="subject">不用麻煩的履歷，只需要你的基本資料</p>
                <p class="content">填寫履歷，多餘又麻煩。何不把它省略呢？<br>我們只需要您的基本資料，其餘雜事，我們處理！<br>立即登錄，享受獵才顧問的專業服務！</p>
            </div>
            <div id="bodybox05">
                <p class="subject">因為沒有工作經驗求職處處碰壁?</p>
                <p class="content">Yung Talent-就愛新鮮人！<br>經過認證的職缺，我們幫你的求職路把關！</p>
            </div>
            <div id="bodybox06">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
        </div>
        <?php $this->load->view('_blocks/_footer')?>
        
    </div>
    <!-- *** -->
    <div id="wall"></div>
    

</body>
</html>

