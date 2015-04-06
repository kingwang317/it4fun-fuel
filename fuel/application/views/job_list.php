<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>YoungTalent - 工作列表</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/common.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script>
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
    <style type="text/css">
    div#pagewrapper {
      position: relative;
      width: 500px;
      margin: 0 auto;
      }

    div.pagination {
      overflow: hidden;
      font-size: 9pt;
      padding: 10px 0;
      }
    div.pagination ul {
      list-style: none;
      padding: 2px 0;
      line-height: 16px;
      }
    div.pagination li {
      display: inline;
      }

    div.pagination.scott {
      padding:3px;
      margin:3px;
      text-align:center;
      }
    div.pagination.scott li a 
      padding: 2px 5px 2px 5px;
      margin-right: 2px;
      border: 1px solid #ddd;
      text-decoration: none;
      color: #88AF3F;
      }
    div.pagination.scott li a:hover, div.pagination.scott a:active {
      border:1px solid #85BD1E;
      color: #638425;
      background-color: #F1FFD6;
      }
    div.pagination.scott li.active {
      padding: 2px 5px 2px 5px;
      margin-right: 2px;
      border: 1px solid #B2E05D;
      font-weight: bold;
      background-color: #B2E05D;
      color: #FFF;
      }
    div.pagination.scott li {
      padding: 2px 5px 2px 5px;
      margin-right: 2px;
      border: 1px solid #f3f3f3;
      color: #ccc;
      }
    </style>
</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php  $this->load->view('_blocks/_header')?>
            <div id="mybox">
                <!-- <div class="leftbox">
                    <div class="box">
                        <div class="headbox">
                            <div class="imgbox"><img src="<?php echo site_url()?>assets/templates/images/head1.png"></div>
                            <p><span>使用者</span><br/>歡迎回來 !</p>                            
                        </div>
                        <ul>
                            <li><a href="#">最新消息</a></li>
                            <li class="active"><a href="#">我的資料</a></li>
                            <li><a href="#">通知</a><div class="circle">1</div></li>
                            <li><a href="#">查看職缺</a></li>
                            <li><a href="#">我的活動</a></li>
                            <li><a href="#">我的記錄</a></li>
                        </ul>
                    </div>
                </div> -->
               
      
                <?php  
                if($account != "")
                    $this->load->view('_blocks/_left_menu')
                
                ?>
                <div id="view_vacanciesbox" <?php echo $account != ""?"":"style='margin-left:100px'"?>>

                   
                    <div class="searchbox">
                        <form action="<?php echo site_url()?>job" method="POST" > 
                            <input type="text" class="search" name="search_keyword" value="<?php echo $search_keyword ?>" />
                            <span>地點：</span>
                            <select class="location" name="search_city">
                                <option value="" <?php echo $search_city == "A"?"selected":""; ?>>不拘</option>
                                <?php
                                    if(isset($city_ary)):
                                ?>  
                                <?php   foreach($city_ary as $key=>$rows):?>
                                    <option value="<?php echo $rows->address_city ?>" <?php if ($search_city == $rows->address_city): ?>
                                        selected
                                    <?php endif ?>><?php echo $rows->address_city ?></option>
                                <?php endforeach;?>
                                <?php endif;?>
         
                            </select>
                            <span>產業：</span>
                            <select  class="type" name="search_skill">
                                <option value="" <?php echo $search_skill == "A"?"selected":""; ?>>不拘</option>
                                <?php
                                    if(isset($skill_ary)):
                                ?>  
                                <?php   foreach($skill_ary as $key=>$rows):?>
                                    <option value="<?php echo $rows->code_id ?>" <?php if ($search_skill == $rows->code_id): ?>
                                        selected
                                    <?php endif ?>><?php echo $rows->code_name ?></option>
                                <?php endforeach;?>
                                <?php endif;?>
                            
                            </select>
                            <input type="submit" class="submit" value="搜尋">
                        </form>
                    </div>
                 
                    <div class="itemsbox">
                        <?php if (isset($results)): ?>
                             <?php foreach ($results as $key => $value): ?>
                               <div class="item">
                                    
                                    <div class="imgbox">
                                    <a href="<?php echo $job_detail_url.$value->id ?>">
                                        <img src="<?php echo $photo_path.$value->company_logo; ?>">
                                     </a>
                                    </div>
                                    <p class="title"><?php echo mb_substr($value->company_name, 0, 30, "utf-8")?></p>
                                    <p class="jobname"><?php echo mb_substr($value->job_title, 0, 30, "utf-8")?></p>
                               
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>
                            找不到職缺
                        <?php endif ?>
                    
                       
                    </div>      
                    <div id="pagewrapper">
                        <div class="pagination scott">
                            <ul >
                                <?php echo $page_jump;?>
                            </ul>   
                        </div>
                    </div>        
                </div>
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
        </div>
        <?php  $this->load->view('_blocks/_footer')?>
    </div>
</body>
</html>

