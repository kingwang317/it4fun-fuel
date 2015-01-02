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
        <div id="myrecordbox">                                   
            <div class="btnbox">
                <ul>
                    <li><div class="btn tab1 active">活動紀錄</div></li>
                    <li><div class="btn tab2">應徵紀錄</div></li>
                </ul>
            </div>
            <div class="tabcontentbox">
                <div class="tabbox tabbox1">
                 <!--    <div class="row">
                        <div class="date">
                            <div>2014年9月30日</div>
                        </div>
                        <div class="content">德剛 參加了活動 『職場列車』德剛 參加了活動 『職場列車』德剛 參加了活動 『職場列車』德剛 參加了活動 『職場列車』德剛 參加了活動 『職場列車』</div>
                    </div> -->
                    <?php if (isset($results_event)): ?>
                        <?php foreach ($results_event as $key => $value): ?>
                            <div class="row">
                                <div class="date">
                                    <div><?php echo date_formatter($value->drop_date,'Y-m-d')  ?></div>
                                </div>
                                <div class="content">參加了活動 『 <?php echo $value->event_title ?> 』</div>
                            </div>                            
                        <?php endforeach ?>
                    <?php endif ?>
                 
                </div>
                <div class="tabbox tabbox2">
                    <div class="row">
                        <div class="brandbox">公司名稱</div>
                        <div class="datebox">應徵日期</div>
                        <div class="positionbox">應徵職位</div>
                        <div class="statebox">狀態</div>
                    </div>

                 <!--    <div class="list">
                        <div class="brand"><a href="#"><img src="images/pic/pic1.png"></a></div>
                        <div class="date">2014/01/01</div>
                        <div class="position">xxxxxxx</div>
                        <div class="state">已讀取</div>
                    </div>
                    <br>
                    -->
                    <?php if (isset($results_deliver)): ?>
                        <?php foreach ($results_deliver as $key => $value): ?>
                            <div class="list">
                                <div class="brand"><?php echo $value->company_name ?></div>
                                <div class="date"><?php echo date_formatter($value->drop_date,'Y-m-d')  ?></div>
                                <div class="position"><a href="<?php echo site_url() ?>job/detail/<?php echo $value->job_id ?>"><?php echo $value->job_title ?></a></div>
                                <div class="state"><?php echo process_type_string($value->process_type) ?></div>
                            </div>
                            <br>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

