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


                <?php
                    if(isset($results_my))
                    {
                        foreach($results_my as $row)
                        {
                ?>

                            <li>
                                <div class="activitybox">
                                    <a href="<?php echo $event_detail_url.$row->event_id?>"><img src="<?php echo $photo_path.$row->event_list_photo?>"></a>
                                    <p><?php echo $row->event_title?>"><?php echo mb_substr($row->event_title, 0, 8, "utf-8")?>...</p>
                                    <p><?php echo mb_substr($row->event_start_date, 0, 16, "utf-8")?></p>
                                </div>
                            </li>
                               
                <?php
                        }
                    }else{
                        echo "沒有參加過活動！";
                    }
                ?>
                              
            </ul>
            <div class="line"></div>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

