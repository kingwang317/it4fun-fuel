<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>YoungTalent - 工作內容</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/index.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="vacanciesbox_content">          
            <table>

                <tr>
                    <td width="234" valign="top"><img src="<?php echo $photo_path.$result->company_logo; ?>"></td>
                    <td width="466" valign="top">
                         <p class="company"><?php echo $result->company_name ?></p>
                        <p class="vacancies"><?php echo $result->job_title ?></p>
                        <p class="desc"><?php echo htmlspecialchars_decode($result->job_intro) ?></p>
                    </td>
                </tr>
            </table>
            <table>
                <tr height="10"><td width="68">&nbsp;</td><td width="632">&nbsp;</td></tr>
                <tr height="35">
                    <td width="68"valign="top"><img src="<?php echo site_url()?>assets/mobile_template/images/icon/icon_1.jpg">
                    </td>
                    <td width="632" valign="top">                                 
                        台北市 內湖區陽光街242號2樓
                    </td>
                </tr>
                <tr height="10"><td width="68">&nbsp;</td><td width="632">&nbsp;</td></tr>
                <tr height="35">
                    <td width="68" valign="top"><img src="<?php echo site_url()?>assets/mobile_template/images/icon/icon_2.jpg">
                    </td>
                    <td width="632" valign="top">                                 
                       <?php echo htmlspecialchars_decode($result->job_desc) ?>
                    </td>
                </tr>
                <tr height="10"><td width="68">&nbsp;</td><td width="632">&nbsp;</td></tr>                
                <tr height="100">
                    <td width="68">&nbsp;</td>
                    <td width="632">                                 
                        <a href="#" class="dropresume">投遞履歷</a>
                    </td>
                </tr>
                <tr height="10"><td width="68">&nbsp;</td><td width="632">&nbsp;</td></tr>
                <tr height="35">
                    <td width="68" valign="top"><img src="<?php echo site_url()?>assets/mobile_template/images/icon/icon_5.jpg">
                    </td>
                    <td width="632" valign="top">                                 
                       <?php echo htmlspecialchars_decode($result->company_intro) ?>      
                    </td>
                </tr>
                <tr height="10"><td width="68">&nbsp;</td><td width="632">&nbsp;</td></tr>
                <tr height="100">
                    <td width="68">&nbsp;</td>
                    <td width="632">                                 
                        <a href="#" class="dropresume">投遞履歷</a>
                    </td>
                </tr>
            </table>

            <br>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
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

</html>

