<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/common.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <div id="headerbox">
                <div id="header">
                    <a class="logo" href="#"><img src="<?php echo site_url()?>assets/templates/images/logo/logo.png"></a>
                    <div class="usr">您好，<span>使用者名稱</span></div>
                    <ul class="menu">
                        <li><a href="#">職缺列表</a></li>
                        <li><a href="#">活動報名</a></li> 
                        <li><a href="#">登出</a></li>             
                    </ul>  
                </div>                          
            </div>
            <div id="mybox">
                <div class="leftbox">
                    <div class="box">
                        <div class="headbox">
                            <div class="imgbox"><img src="<?php echo site_url()?>assets/templates/images/head1.png"></div>
                            <p><span>使用者</span><br/>歡迎回來 !</p>                            
                        </div>
                        <ul>
                            <li><a href="#">最新消息</a></li>
                            <li class="active"><a href="#">我的資料</a></li>
                            <li><a href="#">通知</a><div class="circle">1</div></li>
                            <li><a href="#">查看職缺</a></li>
                            <li><a href="#">我的活動</a></li>
                            <li><a href="#">我的記錄</a></li>
                        </ul>
                    </div>
                </div>
                <div id="view_vacanciesbox">
                    <form>
                        <div class="searchbox">
                            <input type="text" class="search">
                            <span>地點：</span>
                            <select class="location">
                                <option>不拘</option>
                            </select>
                            <span>產業：</span>
                            <select  class="type">
                                <option>不拘</option>
                            </select>
                            <input type="submit" class="submit" value="搜尋">
                        </div>
                    </form>
                    <div class="itemsbox">

                        <?php foreach ($results as $key => $value): ?>
                           <div class="item">
                                <a href="<?php echo $job_detail_url.$value->id ?>">
                                    <div class="imgbox">
                                        <img src="<?php echo $photo_path.$value->company_logo; ?>">
                                    </div>
                                    <p class="title"><?php echo $value->company_name ?></p>
                                    <p class="jobname"><?php echo $value->job_title ?></p>
                                </a>
                            </div>
                        <?php endforeach ?>
                       
                    </div>                    
                </div>
            </div>
            <div id="fbbox">
                <img src="<?php echo site_url()?>assets/templates/images/fbbox.png">
            </div>
            <div id="footerbox">
                <div id="footernavbox">
                    <div class="nav">
                        <ul>
                            <li><a href="#">關於我們</a></li>
                            <li><a href="#">刊登職缺</a></li>
                            <li><a href="#">找打工</a></li>
                            <li><a href="#">常見問題</a></li>
                            <li><a href="#">使用者條款</a></li>
                            <li><a href="#">會員中心</a></li>
                            <li><a href="#">聯絡我們</a></li>
                        </ul>
                    </div>
                </div>
                <div id="footerinfobox">
                    <div class="info">
                        <div class="l">Copyright © 2013 - 2014 . PeopleSearch. All rights reserved.</div>
                        <div class="r">“JobFinder”是PeopleSearch的促進就業推動以及人力資源改善計劃。</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

