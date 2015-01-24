
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
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php  $this->load->view('_blocks/_header')?>
            <div id="mybox">
                <?php  $this->load->view('_blocks/_left_menu')?>
                <div class="rightbox" id="indexbox">

                        <?php if (isset($news_results)): ?>
                             <?php foreach ($news_results as $value): ?>
                               <div class="bigitem">
                                    
                                        <div class="imgbox">
                                            <a href="<?php echo $news_detail_url.$value->id ?>">
                                                <img src="<?php echo $news_photo_path.$value->img; ?>">
                                            </a>
                                        </div>
                                        <p class="title"><?php echo mb_substr($value->title, 0, 8, "utf-8")?></p>
                                        <p class="jobname"><?php echo mb_substr( strip_tags($value->content),0,80,"utf-8"); ?></p>
                                    
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>
                            找不到最新消息
                        <?php endif ?>
                        
                        <p class="line"></p>                        
                        <!-- ===================================================== -->

                         <?php if (isset($job_results)): ?>
                             <?php foreach ($job_results as $key => $value): ?>
                               <div class="item">
                                    <div class="imgbox">
                                        <a href="<?php echo $job_detail_url.$value->id ?>">
                                            <img style="width:275px" src="<?php echo $job_photo_path.$value->company_logo; ?>">
                                        </a>
                                    </div>
                                    <p class="title"><?php echo mb_substr($value->company_name, 0, 8, "utf-8")?></p>
                                    <p class="jobname"><?php echo $value->job_title ?></p>
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>
                            找不到職缺
                        <?php endif ?>

                        <a href="<?php echo $job_target_url ?>" class="morebtn">更多工作 ...</a>
                        <p class="line"></p>
                        <!-- ===================================================== -->

                <?php
                    if(isset($event_results))
                    {
                        foreach($event_results as $row)
                        {
                ?>
                             <div class="item">
                                <div class="imgbox">
                                    <a href="<?php echo $event_detail_url.$row->event_id?>" target="_blank">
                                        <img src="<?php echo $event_photo_path.$row->event_photo?>" width="200" height="200">
                                    </a>
                                </div>
                                <p class="title" title="<?php echo $row->event_title?>"><?php echo mb_substr($row->event_title, 0, 8, "utf-8")?></p>
                                <p class="date"><?php echo mb_substr($row->event_start_date, 0, 16, "utf-8")?></p>
                            </div>                           
                <?php
                        }
                    }else{
                        echo "找不到活動";
                    }
                ?>

                        <a href="<?php echo $event_target_url ?>" class="morebtn">更多活動 ...</a>
                        <p class="line"></p>
                                                         
                    
                </div>
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
            <?php  $this->load->view('_blocks/_footer')?>
        </div>
    </div>
</body>
</html>

