<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>YoungTalent - 活動列表</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/common.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script>
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
    <style type="text/css">
    div#pagewrapper {
      position: relative;
      width: 500px;
      margin: 0 auto;
      }

    div.pagination {
      overflow: hidden;
      font-size: 9pt;
      padding: 10px 0;
      }
    div.pagination ul {
      list-style: none;
      padding: 2px 0;
      line-height: 16px;
      }
    div.pagination li {
      display: inline;
      }

    div.pagination.scott {
      padding:3px;
      margin:3px;
      text-align:center;
      }
    div.pagination.scott li a 
      padding: 2px 5px 2px 5px;
      margin-right: 2px;
      border: 1px solid #ddd;
      text-decoration: none;
      color: #88AF3F;
      }
    div.pagination.scott li a:hover, div.pagination.scott a:active {
      border:1px solid #85BD1E;
      color: #638425;
      background-color: #F1FFD6;
      }
    div.pagination.scott li.active {
      padding: 2px 5px 2px 5px;
      margin-right: 2px;
      border: 1px solid #B2E05D;
      font-weight: bold;
      background-color: #B2E05D;
      color: #FFF;
      }
    div.pagination.scott li {
      padding: 2px 5px 2px 5px;
      margin-right: 2px;
      border: 1px solid #f3f3f3;
      color: #ccc;
      }
    </style>
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
                                        <img src="<?php echo $photo_path.$row->event_list_photo?>" width="200" height="200">
                                    </a>
                                </div>
                                <p class="title" title="<?php echo $row->event_title?>"><?php echo mb_substr($row->event_title, 0, 30, "utf-8")?></p>
                                <p class="date"><?php echo mb_substr($row->event_start_date, 0, 30, "utf-8")?></p>
                            </div>                           
                <?php
                        }
                    }
                ?>
                    <div id="pagewrapper">
                        <div class="pagination scott">
                            <ul >
                                <?php echo $page_jump;?>
                            </ul>   
                        </div>
                    </div>        
                </div>    
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
            <?php $this->load->view('_blocks/_footer')?>

            
        </div>
        <?php $this->load->view('_blocks/_footer')?>
    </div>
</body>
</html>