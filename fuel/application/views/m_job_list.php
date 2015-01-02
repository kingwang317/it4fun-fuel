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
        <div id="vacanciesbox">          
            <ul>

                <?php if (isset($results)): ?>
                         <?php foreach ($results as $key => $value): ?>

                            <li>
                                <div class="vacanciesbox">
                                    <a href="<?php echo $job_detail_url.$value->id ?>"><img src="<?php echo $photo_path.$value->company_logo; ?>"></a>                        
                                    <p class="company"><?php echo $value->company_name ?></p>
                                    <p class="job"><?php echo $value->job_title ?></p>
                                </div>
                            </li>

                            <?php endforeach ?>
                        <?php else: ?>
                            找不到職缺
                        <?php endif ?>

                
                               
            </ul>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

