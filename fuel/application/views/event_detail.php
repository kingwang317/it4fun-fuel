<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>YoungTalent - 活動內容</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/event.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/common.js"></script>
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >

    <!-- Include Google Maps API (Google Maps API v3 已不需使用 API Key) -->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <!-- Require jQuery v1.7.0 or newer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/query.tinyMap.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/terms.js"></script>
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
                    <a href="#" class="addevent">加入活動</a>
                    <div class="contentbox">
                        <div class="llbox">
                            <?php echo $result->event_detail;?>
                        </div>
                        <div class="rrbox">
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
                    </div>
                    <p class="msgbox">已加入活動：<span id="RegiNum"><?php echo $regi_num?></span>/<span id="RegiLimit"><?php echo $result->regi_limit_num?></span></p>
                    <a href="#" class="addevent">加入活動</a>
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
                alert(o.msg);
                if (o.status == -99) {
                    window.location = '<?php echo site_url()."user/myevent"?>' ;//+ '?redirURL=' + document.URL;
                };
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

