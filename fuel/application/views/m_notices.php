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
        <div id="messagebox">     
            <h2 class="titlebox"><img src="<?php echo site_url()?>assets/mobile_template/images/icon/msg.png"></h2>       
            <ul>
                <?php if (isset($result)): ?>
                    <?php foreach ($result as $key => $value): ?>
                        <li>
                            <div class="msgbox">
                                <div class="imgbox"><img src="<?php echo $photo_path.$value->company_logo; ?>"></div>
                                <div class="descbox">
                                    <div class="date"><?php echo date_formatter($value->drop_date,'Y-m-d') ?></div>
                                    <div class="company"><?php echo $value->company_name ?></div>
                                    <div class="job"><u><?php echo $value->job_title ?></u></div>
                                    <div class="time"><?php echo $value->interview_time ?></div>
                                    <div class="addr"><?php echo $value->interview_place ?></div>
                                    <div class="btn">
                                        <ul>
                                            <li><a href="#" data-id="<?php echo $value->id ?>" class="btn1 attend">出席</a></li>
                                            <li><a href="#" data-id="<?php echo $value->id ?>" class="btn2 declined">婉拒</a></li>
                                            <li><a href="#" data-id="<?php echo $value->id ?>" class="btn3 reply">回復</a></li>   
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li> 
                    <?php endforeach ?>
                <?php endif ?>                                            
            </ul>
            <div class="line"></div>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
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
                        callback(response_type,id);
                    },
                        "No": function () {
                        $(this).dialog('close');
                        // callback(false);
                    }
                }
            });
        }

        function callback(response_type,id) {
            console.log(response_type);
            console.log(id);
            $.ajax({
                    url: '<?php echo $notice_response_url ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {drop_id:id,response_type:response_type},
                })
                .done(function(o) {
                    // console.log("success");
                    // console.log(o);
                    alert(o.msg);
                    location.reload();
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
           
        }

        jQuery(document).ready(function($) {
            
            $('.attend').click(function(){
                fnOpenNormalDialog('確定出席?',0,$(this).attr('data-id'));
            });

            $('.declined').click(function(){
                fnOpenNormalDialog('確定婉拒?',1,$(this).attr('data-id'));
            }); 
             
        });

    </script>
</body>
</html>

