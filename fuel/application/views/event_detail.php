<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
    <title>YoungTalent - 活動內容</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/event.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
 <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/common.js"></script>
           <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script>
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >

    <!-- Include Google Maps API (Google Maps API v3 已不需使用 API Key) -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- Require jQuery v1.7.0 or newer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/query.tinyMap.min.js"></script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=787884584567146&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php  $this->load->view('_blocks/_header')?>
            <div id="mybox">                
                <div id="eventbox">
                    <div class="subjectbox">
                        <?php echo $result->event_title?>
                        <p class="date"><?php echo mb_substr($result->event_start_date, 0, 10, "utf-8")?></p>
                    </div>
                    <div class="photobox">
                        <img src="<?php echo $photo_path.$result->event_photo?>" width="950" height="470">
                    </div>
                    
                    <?php if($account != null && $account != ""){?>
                    <a href="#" class="addevent">加入活動</a>
                    <?php }else{ ?>
                    <a href="#" class="loginbox" style="  display: block;
    width: 215px;
    height: 57px;
    text-align: center;
    line-height: 57px;
    background-color: #8cc63f;
    color: #fff;
    box-shadow:  3px 3px 0px 0 #3a521a;
    border-radius: 10px;
    font-size: 24px;
    text-decoration: none;
    margin: 0 auto;
    text-shadow:  1px 1px 3px #3a521a;  ">註冊登入後加入</a>
                    <?php } ?>
                    <div class="contentbox">
                        <div class="llbox">
                            <?php echo $result->event_detail;?>
                            <div style="clear:both;"></div>
                        </div>

                        <div class="rrbox">
                            <div style="clear:both;"></div>   
                            <div class="infobox">
                                <p>時間: <?php echo mb_substr($result->event_start_date, 0, 16, "utf-8")?> ~ <?php echo mb_substr($result->event_end_date, 0, 16, "utf-8")?></p>
                                <p>地點： <span id="EventPlace"><?php echo $result->event_place?></span></p>
                                <p>
                                    費用：
                                    <?php
                                        if($result->event_charge == 0)
                                        {
                                            echo "免費";
                                        }
                                        else
                                        {
                                            echo $result->event_charge;
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="mapbox">

                            </div>
                        </div>
                        <div style="clear:both;"></div>     
                    </div>
                    <div style="clear:both;"></div> 
                    <div class="msgbox">已加入活動：<span id="RegiNum"><?php echo $regi_num?></span>/<span id="RegiLimit"><?php echo $result->regi_limit_num?></span></div>
                     <?php if($account != null && $account != ""){?>
                    <a href="#" class="addevent">加入活動</a>
                    <?php }else{ ?>
                    <a href="#" class="loginbox" style="  display: block;
    width: 215px;
    height: 57px;
    text-align: center;
    line-height: 57px;
    background-color: #8cc63f;
    color: #fff;
    box-shadow:  3px 3px 0px 0 #3a521a;
    border-radius: 10px;
    font-size: 24px;
    text-decoration: none;
    margin: 0 auto;
    text-shadow:  1px 1px 3px #3a521a;  ">註冊登入後加入</a>
                    <?php } ?>
                </div>    
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
             
        </div>
        <?php $this->load->view('_blocks/_footer')?>
    </div>

<script type="text/javascript">

    jQuery(document).ready(function($) {

        $('.mapbox').tinyMap({
            center: '<?php echo $result->event_place?>',
            zoom: 15,
            marker: [
                {
                    addr: '<?php echo $result->event_place?>',
                    text: '<?php echo $result->event_place?>',
                    
                    css: 'labels',
                    // 自訂 marker click 事件
                    event: function (e) {
                        alert(e.latLng);
                    },
                    // 或是下列方式綁定多種事件
                    event: {
                        'click' : function (e) {
                            alert('<?php echo $result->event_place?>');
                        }
                    },
                    // 動畫效果
                    animation: 'DROP|BOUNCE'
                }
            ]
        });



        $(".addevent").click(function(event) {
            $.ajax({
                url: '<?php echo $regi_url ?>',
                type: 'POST',
                dataType: 'json',
                
            })
            .done(function(o) {
                console.log("success");
                console.log(o);
               
                if('<?php echo $account; ?>' == "" && o.status == -99){
                    alert("請先登入後，再報名活動");
                    window.location = '<?php echo site_url()."home/login?target_url=event/detail/".$event_id ?>' ;//+ '?redirURL=' + document.URL;
                }else{
                    alert(o.msg);
                    window.location = '<?php echo site_url()."user/myevent"?>' ;//+ '?redirURL=' + document.URL;
                }  
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });
    });

</script>
</body>
</html>

