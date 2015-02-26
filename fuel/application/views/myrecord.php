<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>YoungTalent - 通知頁面</title>    
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
                <div class="rightbox" id="myrecordbox">
                    <div class="leftbox">
                        <div class="infobox">
                            <ul>
                                <li><div class="eventsrecordbtn active">活動紀錄</div></li>
                                <li><div class="recruitedbtn">應徵紀錄</div></li>
                            </ul>
                            <div class="contentbox">
                                <div class="eventsrecordbox">

                                   <!--  <div class="list">
                                        <div class="title"><div class="datebox">2014年9月30日</div></div>
                                        <div class="msg">活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄...
                                        </div>
                                    </div> -->
                                    <?php if (isset($results_event)): ?>
                                        <?php foreach ($results_event as $key => $value): ?>
                                            <div class="list">
                                                <div class="title">
                                                    <div><?php echo date_formatter($value->drop_date,'Y-m-d')  ?></div>
                                                </div>
                                                <div class="msg">參加了活動 『 <?php echo $value->event_title ?> 』</div>
                                            </div>                            
                                        <?php endforeach ?>
                                    <?php endif ?>                                    
                                    
                                </div>
                                <div class="recruitedbox">
                                    <table>
                                        <thead style="color:#999;">
                                            <tr height="40">
                                            <td width="85" align="center">公司名稱</td>
                                            <td width="110">應徵日期</td>
                                            <td width="200">應徵職位</td>
                                            <td width="80" align="center">狀態</td>
                                            </tr>
                                        </thead>

                                      <!--   <tr height="100">
                                            <td width="85"><img src="images/other/pic2.jpg" width="75"></td>
                                            <td width="110">2014/10/10</td>
                                            <td width="200">賣場工讀生</td>
                                            <td width="80" align="center">已讀取</td>
                                        </tr> -->
                                          <?php if (isset($results_deliver)): ?>
                                            <?php foreach ($results_deliver as $key => $value): ?>
                                             <!--    <div class="list">
                                                    <div class="brand"><?php echo $value->company_name ?></div>
                                                    <div class="date"><?php echo date_formatter($value->drop_date,'Y-m-d')  ?></div>
                                                    <div class="position"><a href="<?php echo site_url() ?>job/detail/<?php echo $value->job_id ?>"><?php echo $value->job_title ?></a></div>
                                                    <div class="state"><?php echo process_type_string($value->process_type) ?></div>
                                                </div>
                                                <br> -->
                                                <tr height="100">
                                                    <td width="85"><?php echo $value->company_name ?></td>
                                                    <td width="110"><?php echo date_formatter($value->drop_date,'Y-m-d')  ?></td>
                                                    <td width="200"><a href="<?php echo site_url() ?>job/detail/<?php echo $value->job_id ?>"><?php echo $value->job_title ?></a></td>
                                                    <td width="80" align="center"><?php echo process_type_string($value->process_type) ?></td>
                                                </tr> 
                                            <?php endforeach ?>
                                        <?php endif ?>
                                         

                                    </table>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="rightbox">
                        <ul>
                            <li>
                                <!-- <div class="item">
                                    <div class="imgbox">
                                        <img src="images/other/pic2.jpg">
                                    </div>
                                    <p class="title">迪卡儂運動用品</p>
                                    <p class="jobname">賣場工讀生</p>
                                </div> -->
                                <?php if (isset($results_jobs)): ?>
                                     <?php foreach ($results_jobs as $key => $value): ?>
                                       <div class="item">
                                            
                                                <div class="imgbox">
                                                    <a href="<?php echo $job_detail_url.$value->id ?>">
                                                        <img src="<?php echo $photo_path.$value->company_logo; ?>">
                                                    </a>
                                                </div>
                                                <p class="title"><?php echo mb_substr($value->company_name, 0, 8, "utf-8")?></p>
                                                <p class="jobname"><?php echo mb_substr($value->job_title, 0, 8, "utf-8")?></p> 
                                        </div>
                                    <?php endforeach ?> 
                                <?php endif ?> 
                            </li>
                        </ul>
                    </div>
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

