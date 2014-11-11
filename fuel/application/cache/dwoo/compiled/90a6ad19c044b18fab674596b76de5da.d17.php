<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><ul>
    <li class="logo1" style="margin-right:20px; margin-top:20px; height:78px;"><a href="http://www.uniqlo.com/tw/" target="_blank"><img src="<?php echo img_path('http://www.ytalent.com.tw/assets/templates/images/logo/uniqlo.png');?>" /></a></li>
    <li class="logo3" style="margin-right:20px; margin-top:20px; height:78px;"><a href="http://www.decathlon.tw/" target="_blank"><img src="<?php echo img_path('http://www.ytalent.com.tw/assets/templates/images/logo/deca.png');?>" /></a></li>
    <li style="margin-right:20px; margin-top:20px; height:78px;"><a href="http://www.rmtofficial.com/" target="_blank"><img src="<?php echo img_path('http://www.ytalent.com.tw/assets/templates/images/logo/cmt.png');?>" /></a></li>
    <li class="logo1" style="margin-right:20px; margin-top:20px; height:78px;"><a href="http://www.hugoboss.com" target="_blank"><img src="<?php echo img_path('http://www.ytalent.com.tw/assets/templates/images/logo/boss0.png');?>" /></a></li>
    <li class="logo2" style="margin-right:20px; margin-top:20px; height:78px;"><a href="http://www.pplesearch.com/" target="_blank"><img src="<?php echo img_path('http://www.ytalent.com.tw/assets/templates/images/logo/pst.png');?>" /></a></li>
</ul><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>