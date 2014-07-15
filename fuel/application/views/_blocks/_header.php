<div id="headerbox">
    <a class="logo" href="<?php echo site_url()?>"></a>
    <ul class="menu">
       <!-- <li><a href="<?php echo site_url()?>home/campusevents/">校園活動</a></li>
        <li><a href="<?php echo site_url()?>home/campusevents/">關於我們</a></li>      
        -->       
    </ul>


    <?php if(strpos($views,"home") >-1){ ?>
    <div id="loginbox">登入</div>
    <div id="logdata"></div>
    
    
    
    <!--<div class="fb"></div>-->
    <?php }?>
</div>
