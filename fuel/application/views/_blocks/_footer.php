<div id="footerbox">
    <div id="footernavbox">
        <div class="nav">
            <ul>
                <li><a href="#">關於我們</a></li>
                <li><a href="#">校園活動</a></li>
                <li><a href="#">常見問題</a></li>
                <li><a href="#">使用者條款</a></li>
                <li><a href="#">聯絡我們</a></li>
            </ul>
        </div>
    </div>
    <div id="footerinfobox">
        <div class="info">
            <div class="l">Copyright © 2013 - 2014 . PeopleSearch. All rights reserved.</div>
            <div class="r">“JobFinder”是PeopleSearch的促進就業推動以及人力資源改善計劃。</div>
        </div>
    </div>
</div>
      <div id="logindialog">
        <form action="<?php echo site_url()?>user/login" method="POST" >
            <div class="close"></div>
            <div class="subject">登入帳號</div>
            <div class="line"></div>            
            <div class="account">
                <div class="title">電子郵件</div>
                <div class="input"><input type="text" class="mail" name="login_mail" id="login_mail" value=""></div>
                <div class="icon"><div class="ok"></div></div>
            </div>
            <div class="password">
                <div class="title">密碼</div>
                <div class="input"><input type="password" class="password" name="login_password" id="login_password" value=""></div>
                <div class="icon"></div>
            </div>            
            <div class="submit">
                <input type="submit" class="submitbtn" name="submitbtn_2" id="submitbtn_2"  value="登入">
            </div>
            <div class="fbbox">
                <p>使用臉書登入，又快又方便 &nbsp;&nbsp;&nbsp;&nbsp;</p> 
                 <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>
            </div>
        </form>
    </div>
<script type="text/javascript">
$("#submitbtn_2").click(function(){
    //alert($("#repassword_icon").is(":visible"));
    //return false;
   if($("#login_mail").val() != "" && $("#login_password").val() != ""){
        alert("請輸入帳號密碼");
            return false;
   }
   return true;
  
});
</script>
<script type="text/javascript" src="<?php echo site_url()?>assets/js/site.js?t=<?=$t?>"></script>
<script type="text/javascript" src="<?php echo site_url()?>assets/js/fb.js?t=<?=$t?>"></script>