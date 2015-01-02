<div id="headerbox">
        <a class="squarebtn" href="<?php echo site_url()?>user/mybox"></a>
        <div id="logo"></div>
        <?php if(isset($account) && $account != null && $account != ""){?>
        <a class="setbtn" href="<?php echo site_url()?>user/editinfo"></a>
        <?php }else{ ?>
        <a class="addbtn" href="<?php echo site_url()?>register/index"></a>
        <?php } ?>
    </div>    