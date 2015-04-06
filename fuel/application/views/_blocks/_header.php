<?php
$this->load->model('code_model');
$account = $this->code_model->get_logged_in_account();
$recommended_id = $this->input->get("recid");
if($recommended_id != null && $recommended_id  != ""){
    $this->load->helper('cookie');
    $this->input->set_cookie("ytalent_recommended_id","", time()-3600);
    $this->input->set_cookie("ytalent_recommended_id",$recommended_id, time()+3600);
}

//echo $title;

//echo $this->input->cookie("ytalent_recommended_id");

?>


      <div id="top_nav" >

            <div id="logo_img">
                <?php if($account == null || $account == ""){?>

            <a href="<?php echo site_url()?>"><img src="<?php echo site_url()?>assets/templates/images/logo/logo2.png"></a>
            <?php }else{ ?>
            <a href="<?php echo site_url()?>user/mynews"><img src="<?php echo site_url()?>assets/templates/images/logo/logo2.png"></a>
            <?php } ?>
        </div>
                    <ul>
                        

         <?php if($account != null && $account != ""){?>
            <li><a href="<?php echo site_url()?>user/editinfo" alt="檢視我的檔案">我的檔案</a></li>
            <li><a href="<?php echo site_url()?>user/logout" alt="登出">登出</a></li>
            <?php }else{ ?>
            <li><a href="#" class="register_btn" style="color:yellow;"><!--<img src="<?php echo site_url()?>assets/templates/images/icon/login2.png">-->註冊/登錄</a></li>
            <?php } ?>
                                       
                        </li>
                        <li><a href="<?php echo site_url()?>user/mynews/">最新消息</a></li>
                        <li><a href="<?php echo site_url()?>job/">職缺列表</a></li>
                        <li><a href="<?php echo site_url()?>event/">活動列表</a></li>
                        <li><a href="<?php echo site_url()?>home/aboutus/">關於我們</a></li>
                      <!--  <li><a href="<?php echo site_url()?>home/campusevent/">校園活動</a></li>
                    -->
                        <li><a href="<?php echo site_url()?>home/terms/">使用者條款</a></li>
                        <li><a href="<?php echo site_url()?>home/contact/">聯絡我們</a></li>
                    </ul>
    </div>
  <!--
  <?php if($account == null || $account == ""){?>
    <a class="logo" href="<?php echo site_url()?>"></a>
    <?php }else{ ?>
    <a class="logo" href="<?php echo site_url()?>user/mynews"></a>
    <?php } ?>
    <ul class="menu">
      <li><a href="<?php echo site_url()?>home/campusevents/">校園活動</a></li>
        <li><a href="<?php echo site_url()?>home/aboutus/">關於我們</a></li>      
             
    </ul>


    <?php if(1==1){ ?>

    <?php if($account != null && $account != ""){?>
    <a href="<?php echo site_url()?>user/editinfo" alt="檢視我的檔案"><div id="myinfobox" ></div></a>
    <a href="<?php echo site_url()?>user/logout" alt="登出"><div id="logout" ></div></a>
    <?php }else{ ?>
    <div id="loginbox">註冊/登錄</div>
    <?php } ?>
    -->  
    <!--登入按鈕-->

        
    
    
    <!--<div class="fb"></div>-->
    <?php }?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52531873-1', 'auto');
  ga('send', 'pageview');

</script>
