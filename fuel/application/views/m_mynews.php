<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>YoungTalent - 最新消息</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/index.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="newsbox">     
            <h2 class="titlebox"><img src="<?php echo site_url()?>assets/mobile_template/images/icon/news.png"></h2>       
            <ul>
                 <?php if (isset($news_results)): ?>
                             <?php foreach ($news_results as $value): ?>

                            <li>                    
                                <div class="imgbox"><img src="<?php echo $news_photo_path.$value->img; ?>"></div>
                                <div class="title"><?php echo $value->title ?></div>
                                <div class="content">
                                    <?php echo mb_substr( strip_tags($value->content),0,80,"utf-8"); ?> (<a href="#" class="more">more</a>)
                                </div>
                            </li> 

                            <?php endforeach ?>
                <?php else: ?>
                    找不到最新消息
                <?php endif ?>

                                             
            </ul>
            <div class="line"></div>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

