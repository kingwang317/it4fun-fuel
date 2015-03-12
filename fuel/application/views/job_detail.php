<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>YoungTalent - 工作內容</title>    
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
                <div id="vacanciesbox">
                    <table>

                        <tr>
                            <td width="233" valign="top" style="padding-left:75px;"><img src="<?php echo $photo_path.$result->company_logo; ?>"></td>
                            <td width="665" valign="top">
                                <p class="company"><?php echo $result->company_name ?></p>
                                <p class="vacancies"><?php echo $result->job_title ?></p>
                                <p class="desc"><?php echo htmlspecialchars_decode($result->job_intro) ?></p>
                            </td>
                        </tr>

                        <tr height="100">
                            <td width="233">&nbsp;</td>
                            <td width="665">                                 
                                <a href="#" class="dropresume">投遞履歷</a>
                            </td>
                        </tr>
                        <tr height="10"><td width="233">&nbsp;</td><td width="665">&nbsp;</td></tr>
                        <tr height="35">
                            <td width="156" valign="top" style="padding-left:155px;background:url(<?php echo site_url()?>assets/templates/images/icon/icon_8.jpg);background-repeat:no-repeat;background-position:120px 0px;">
                            工作地點：
                            </td>
                            <td width="665" valign="top">                                 
                                <?php echo $result->job_address ?>
                            </td>
                        </tr>
                        <tr height="10"><td width="233">&nbsp;</td><td width="665">&nbsp;</td></tr>
                        <tr height="35">
                            <td width="156" valign="top" style="padding-left:155px;background:url(<?php echo site_url()?>assets/templates/images/icon/icon_9.jpg);background-repeat:no-repeat;background-position:120px 0px;">
                            工作說明：
                            </td>
                            <td width="665" valign="top">                                 
                               <?php echo htmlspecialchars_decode($result->job_desc) ?>  
                            </td>
                        </tr>
                        <tr height="10"><td width="233">&nbsp;</td><td width="665">&nbsp;</td></tr>
                        <tr height="35">
                            <td width="156" valign="top" style="padding-left:155px;background:url(<?php echo site_url()?>assets/templates/images/icon/icon_10.jpg);background-repeat:no-repeat;background-position:120px 0px;">
                            工作技能：
                            </td>
                            <td width="665" valign="top">  
                                <?php echo $job_skill ?>
                            </td>
                        </tr>
                        <tr height="10"><td width="233">&nbsp;</td><td width="665">&nbsp;</td></tr>
                        <tr height="35">
                            <td width="156" valign="top" style="padding-left:155px;background:url(<?php echo site_url()?>assets/templates/images/icon/icon_10.jpg);background-repeat:no-repeat;background-position:120px 0px;">
                            語言能力:
                            </td>
                            <td width="665" valign="top">    
                                <?php echo $job_lang ?>
                            </td>
                        </tr>
                        <tr height="10"><td width="233">&nbsp;</td><td width="665">&nbsp;</td></tr>
                        <tr height="35">
                            <td width="156" valign="top" style="padding-left:155px;background:url(<?php echo site_url()?>assets/templates/images/icon/icon_11.jpg);background-repeat:no-repeat;background-position:120px 0px;">
                            工作條件：
                            </td>
                            <td width="665" valign="top">                                 
                               <?php echo htmlspecialchars_decode($result->job_term) ?>
                            </td>
                        </tr>
                        <tr height="100">
                            <td width="233">&nbsp;</td>
                            <td width="665">                                 
                                <a href="#" class="dropresume">投遞履歷</a>
                            </td>
                        </tr>
                        <tr height="10"><td width="233">&nbsp;</td><td width="665">&nbsp;</td></tr>
                        <tr height="35">
                            <td width="156" valign="top" style="padding-left:155px;background:url(<?php echo site_url()?>assets/templates/images/icon/icon_12.jpg);background-repeat:no-repeat;background-position:120px 0px;">
                            關於公司：
                            </td>
                            <td width="665" valign="top"> 
                                <?php echo htmlspecialchars_decode($result->company_intro) ?>                               
                               
                            </td>
                        </tr>
                        <tr height="10"><td width="233">&nbsp;</td><td width="665">&nbsp;</td></tr>
                    </table>
                    <br/>
                    <br/>
                </div>    
            </div>
            <div id="fbbox" style="display:none;">
                <img src="<?php echo site_url()?>assets/templates/images/fbbox.png">
            </div>
        </div>
        <?php  $this->load->view('_blocks/_footer')?>
    </div>

<script type="text/javascript">

    jQuery(document).ready(function($) {
        $(".dropresume").click(function(event) {

            if('<?php echo $account; ?>' == ''){
                    alert("請先登入後，再投遞履歷");
                    window.location = '<?php echo site_url()."home/login?target_url=job/detail/".$job_id ?>' ;//+ '?redirURL=' + document.URL;
            }
            $.ajax({
                url: '<?php echo $regi_url ?>',
                type: 'POST',
                dataType: 'json',
                data: {job_id: '<?php echo $job_id ?>'},
            })
            .done(function(o) {
                console.log("success");
                console.log(o);
                alert(o.msg);
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

