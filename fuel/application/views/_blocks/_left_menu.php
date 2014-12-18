
<?php
$this->load->model('code_model');
$account = $this->code_model->get_logged_in_account();
$data = $this->code_model->get_account_data($account);
// $fb_data  = $this->code_model->get_fb_data("user/do_connect_fb2account");

?>
<div class="leftbox">
  <div class="box">
      <div class="headbox">
          <div class="imgbox">
         
            <!-- <img src="<?php echo site_url()?>assets/templates/images/head1.png"> -->
            <?php if($data[0]->avatar=="" && $data[0]->fb_account == ""){ ?>
                 
            <?php }elseif($data[0]->avatar!=""){ ?>              
                <img src="<?php echo site_url()."/assets/avatar/".$data[0]->avatar ?>" style="width: 58px; height: 82px;">
             <?php }elseif($data[0]->fb_account!=""){ ?>
                <img data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?php echo $data[0]->fb_account  ?>/picture?type=large" style="width: 58px;height: 82px;">
               
            <?php } ?>
          </div>
          <p><span><?php echo $data[0]->name ?></span><br/>歡迎回來 !</p>                            
      </div>
      <ul>
          <li><a href="<?php echo site_url().'user/mynews' ?>">最新消息</a></li>
          <li class="active"><a href="<?php echo site_url().'user/editinfo?account='.$account ?>">我的資料</a></li>
          <li><a href="<?php echo site_url().'notices' ?>">通知</a><div class="circle">1</div></li>
          <li><a href="<?php echo site_url().'job' ?>">查看職缺</a></li>
           <li><a href="<?php echo site_url().'user/myevent' ?>">我的活動</a></li>
          <!--<li><a href="#">我的記錄</a></li> -->
      </ul>
  </div>
</div>