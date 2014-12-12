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
                <div id="eventslistbox">
                    <p class="title">活動列表</p>
                <?php
                    if(isset($results))
                    {
                        foreach($results as $row)
                        {
                ?>
                             <div class="item">
                                <div class="imgbox">
                                    <a href="<?php echo $event_detail_url.$row->event_id?>" target="_blank">
                                        <img src="<?php echo $photo_path.$row->event_photo?>" width="200" height="200">
                                    </a>
                                </div>
                                <p class="title" title="<?php echo $row->event_title?>"><?php echo mb_substr($row->event_title, 0, 8, "utf-8")?>...</p>
                                <p class="date"><?php echo mb_substr($row->event_start_date, 0, 16, "utf-8")?></p>
                            </div>                           
                <?php
                        }
                    }
                ?>
                    <br style="clear:both;">
                    <ul class="page">
                        <?php echo $page_jump;?>
                    </ul>
                </div>    
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>

            
        </div>
        <?php $this->load->view('_blocks/_footer')?>
    </div>
</body>
</html>