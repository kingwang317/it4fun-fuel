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
                <div class="rightbox" id="myrecordbox">
                    <div class="leftbox">
                        <div class="infobox">
                            <ul>
                                <li><div class="eventsrecordbtn active">活動紀錄</div></li>
                                <li><div class="recruitedbtn">應徵紀錄</div></li>
                            </ul>
                            <div class="contentbox">
                                <div class="eventsrecordbox">
                                    <div class="list">
                                        <div class="title"><div class="datebox">2014年9月30日</div></div>
                                        <div class="msg">活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄...
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="title"><div class="datebox">2014年9月30日</div></div>
                                        <div class="msg">活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄...
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="title"><div class="datebox">2014年9月30日</div></div>
                                        <div class="msg">活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄...
                                        </div>
                                    </div>
                                    <div class="list">
                                        <div class="title"><div class="datebox">2014年9月30日</div></div>
                                        <div class="msg">活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄活動紀錄...
                                        </div>
                                    </div>
                                </div>
                                <div class="recruitedbox">
                                    <table>
                                        <thead style="color:#999;">
                                            <tr height="40">
                                            <td width="85" align="center">品牌</td>
                                            <td width="110">應徵日期</td>
                                            <td width="200">應徵職位</td>
                                            <td width="80" align="center">狀態</td>
                                            </tr>
                                        </thead>

                                        <tr height="100">
                                            <td width="85"><img src="images/other/pic2.jpg" width="75"></td>
                                            <td width="110">2014/10/10</td>
                                            <td width="200">賣場工讀生</td>
                                            <td width="80" align="center">已讀取</td>
                                        </tr>
                                        <tr height="100">
                                            <td width="85"><img src="images/other/pic2.jpg" width="75"></td>
                                            <td width="110">2014/10/10</td>
                                            <td width="200">賣場工讀生</td>
                                            <td width="80" align="center">已讀取</td>
                                        </tr>
                                        <tr height="100">
                                            <td width="85"><img src="images/other/pic2.jpg" width="75"></td>
                                            <td width="110">2014/10/10</td>
                                            <td width="200">賣場工讀生</td>
                                            <td width="80" align="center">已讀取</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="rightbox">
                        <ul>
                            <li>
                                <div class="item">
                                    <div class="imgbox">
                                        <img src="images/other/pic2.jpg">
                                    </div>
                                    <p class="title">迪卡儂運動用品</p>
                                    <p class="jobname">賣場工讀生</p>
                                </div>
                                <div class="item">
                                    <div class="imgbox">
                                        <img src="images/other/pic2.jpg">
                                    </div>
                                    <p class="title">迪卡儂運動用品</p>
                                    <p class="jobname">賣場工讀生</p>
                                </div>
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

