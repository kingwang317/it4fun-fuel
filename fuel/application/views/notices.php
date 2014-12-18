<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/css/jquery.autocomplete.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/common.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/editinfo.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery.twzipcode.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script> 
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php  $this->load->view('_blocks/_header')?>
            <div id="mybox">
                <?php  $this->load->view('_blocks/_left_menu')?>
                <div class="rightbox">
                    <div class="noticesbox">

                         <?php if (isset($result)): ?>
                            <?php foreach ($result as $key => $value): ?>
                                 <div class="item">
                                    <div class="photobox">
                                        <img src="<?php echo $photo_path.$value->company_logo; ?>" width="152">
                                    </div>
                                    <div class="infobox">
                                        <p class="date1"><?php echo date_formatter($value->drop_date,'Y-m-d') ?></p>
                                        <p class="title"><?php echo $value->company_name ?></p>
                                        <p class="name">職稱：<a href="<?php echo site_url().'job/detail/'.$value->job_id ?>"><?php echo $value->job_title ?></a></p>
                                        <p class="date2">面試時間：xxx</p>
                                        <p class="location">面試地點：xxx</p>
                                    </div>
                                    <div class="btnbox">
                                        <a href="#" data-id="<?php echo $value->id ?>" class="attend">出席</a>
                                        <a href="#" data-id="<?php echo $value->id ?>" class="declined">婉拒</a>
                                        <a href="#" data-id="<?php echo $value->id ?>" class="reply">回復</a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                            
                    </div>

                    <div id="dialog-confirm"></div>
                </div>
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>          
            <?php  $this->load->view('_blocks/_footer')?>
        </div>

    </div>
<script type="text/javascript">

    function fnOpenNormalDialog(msg,response_type,id) {
        $("#dialog-confirm").html(msg);

        // Define the Dialog and its properties.
        $("#dialog-confirm").dialog({
            resizable: false,
            modal: true,
            title: "",
            height: 250,
            width: 400,
            buttons: {
                "Yes": function () {
                    $(this).dialog('close');
                    callback(msg,response_type,id);
                },
                    "No": function () {
                    $(this).dialog('close');
                    // callback(false);
                }
            }
        });
    }

    function callback(response_type,id) {
        $.ajax({
                url: '<?php echo $notice_response_url ?>',
                type: 'POST',
                dataType: 'json',
                data: {drop_id:id,response_type:response_type},
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
    }

    jQuery(document).ready(function($) {
        
        $('.attend').click(function(){
            fnOpenNormalDialog('確定出席?',0,$(this).data('id'));
        });

        $('.declined').click(function(){
            fnOpenNormalDialog('確定婉拒?',1,$(this).data('id'));
        }); 
         
    });

</script>
</body>
</html>

