<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/css/signing2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/signing2.js"></script>
</head>

<body>
    <div id="maincontain">        
        <div id="textbox">
            <p class="subject" >基本資料</p>
            <form>                    
                       
                <div class="nameinfo">
                    <div class="top">
                        <p>姓名</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1"><input type="text" name="name" value=""></li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->
                <div class="birthdayinfo">
                    <div class="top">
                        <p>生日</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1"><input type="text" name="birthday" value=""></li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->
                <div class="phoneinfo">
                    <div class="top">
                        <p>聯絡電話</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1"><input type="text" name="phone" value=""></li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->
                <div class="addressinfo">
                    <div class="top">
                        <p>聯絡地址</p>
                    </div>
                    <div class="bottom">
                        <select>
                            <option>縣市</option>
                        </select>
                        <select>
                            <option>鄉鎮市區</option>
                        </select>
                        <ul>
                            <li class="l1"><input type="text" name="phone" value=""></li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->
                <div class="schoolinfo">
                    <div class="top">
                        <p>學校</p>
                    </div>
                    <div class="bottom">
                        <ul class="schoollist">
                            <li class="l1">
                                <input type="text" name="school1" value=""><br>
                                <div class="box">
                                    <input type="radio" class="schoolstate" name="schoolstate1" value="" checked>
                                    <span>畢業</span>
                                    <input type="radio" class="schoolstate"  name="schoolstate1" value="">
                                    <span>在學</span>
                                </div>
                            </li>
                        </ul>
                        <div id="addschool">新增一筆學校</div>
                    </div>
                </div>                        
                <!-- *** -->
                <div class="jobinfo">
                    <div class="top">
                        <p>工作經驗</p>
                    </div>
                    <div class="bottom">
                        <ul class="joblist">
                            <li class="l1">
                                <input type="text" name="company1" value=""><br>
                                <input type="text" name="position1" value=""><br>
                                <input type="date" class="datestart datepicker1" name="datestart1">
                                &nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;
                                <input type="date" class="dateend datepicker1" name="dateend1"><br>
                            </li>
                        </ul>
                        <div id="addjob">新增一筆經驗</div>
                    </div>
                </div>
                <!-- *** -->
                <div class="skillinfo">
                    <div class="top">
                        <p>工作技能</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1"><input type="text" name="skilllist" value=""></li>
                        </ul>
                    </div>
                </div>                
                <!-- *** -->
                <div class="aboutmeinfo">
                    <div class="top">
                        <p>關於自己</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1">
                                <textarea type="text" name="aboutme" placeholder="介紹一下你自已吧">
                                </textarea>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->
                <div class="recommendedinfo">
                    <div class="top">
                        <p>推薦人</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1"><input type="text" name="recommended"></li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->
                <div class="employmentstatusinfo">
                    <div class="top">
                        <p>就業狀態</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1">
                                <input type="radio" name="employmentstatus" value="0" checked><span>&nbsp;&nbsp;在職</span>
                                <input type="radio" name="employmentstatus" value="0"><span>&nbsp;&nbsp;在學</span>
                                <input type="radio" name="employmentstatus" value="0"><span>&nbsp;&nbsp;待業</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->
                <div class="searchjobinfo">
                    <div class="top">
                        <p>尋找工作</p>
                    </div>
                    <div class="bottom">
                        <ul>
                            <li class="l1">
                                <input type="radio" name="searchjobstatus" value="0" checked><span>&nbsp;&nbsp;我在找打工</span>
                                <input type="radio" name="searchjobstatus" value="0"><span>&nbsp;&nbsp;我在找全職工作</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- *** -->    
                <div class="submitbox">                   
                    <input type="submit" class="submit" value="送出">
                </div>


            </form>


            
        </div>
        <?php $this->load->view('_blocks/_m_footer')?>
    </div>
    <div id="header">
        <div id="logo"></div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

