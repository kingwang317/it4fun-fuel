<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>YoungTalent - 登入</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/signing.js"></script>
</head>

<body>
    <div id="maincontain">        
        <div id="textbox">
            <form action="<?php echo site_url()?>user/do_login" method="POST" >
                <h1 class="loginWelcome">歡迎回來YoungTalent！</h1>
                <p class="loginmsgbox" id="login_error_msg" name="login_error_msg"></p>

                <input type="text" class="username" placeholder="電子郵件" name="login_mail" id="login_mail">
                <input type="password" class="password" placeholder="PASSWORD" name="login_password" id="login_password" >

                <button type="submit" class="submit" name="submitbtn_2" id="submitbtn_2" >登入</button>
            </form>
            
            <p class="loginorline">或者</p>
               
                <a  class="fbbtn" href="<?php echo $fb_data['login_url'] ?>" id="fbbtn"></a>
                <p class="loginmsgbox">我們不會在您的 Facebook 發佈任何貼文。</p>
            </div>
        </div>
       
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
<script type="text/javascript">
$("#submitbtn_2").click(function(){
    //alert($("#repassword_icon").is(":visible"));
    //return false;
   if($("#login_mail").val() == "" || $("#login_password").val() == ""){
        //alert("請輸入帳號密碼");
        $("#login_error_msg").text("請輸入帳號密碼");
            return false;
   }
   return true;
  
});
</script>
</html>

