<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>YoungTalent - 註冊STEP1</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/signing.js"></script>
</head>

<body>
    <div id="maincontain">        
        <div id="textbox">
            <form action="<?php echo site_url()?>register/step1_save/" method="POST"> 
                <h1 class="loginWelcome">歡迎來到YoungTalent！</h1>
                <p class="loginmsgbox" id="regi_error_msg" name="regi_error_msg"></p>

                <input type="text" class="username" placeholder="電子郵件" name="mail" id="mail" >
                <span class="ok" id="mail_icon" ><img src="<?php echo site_url()?>assets/mobile_template/images/icon/ok.png"></span>

                <input type="password" class="password" placeholder="PASSWORD"  name="password" id="password" >
                <span class="ok" id="password_icon" ><img src="<?php echo site_url()?>assets/mobile_template/images/icon/ok.png"></span>

                <input type="password" class="password" placeholder="REPASSWORD" name="repassword" id="repassword" >
                <span class="ok" id="repassword_icon"><img src="<?php echo site_url()?>assets/mobile_template/images/icon/ok.png"></span>
                <br class="CLEAR">

                <div class="checkbox">
                 <p><input type="checkbox" class="checkbox" name="agree" id="agree">我同意<a href="<?php echo site_url()?>home/terms/">網站使用條款</a></p>
                </div>

                <button type="submit" class="submit" name="submitbtn_1" id="submitbtn_1" >註冊</button>
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
$("#mail_icon").hide();
$("#password_icon").hide();
$("#repassword_icon").hide();

$("#password").blur(function(){
    //alert($("#password").val().length);
        
        if($("#password").val().match(/\d/) && $("#password").val().match(/[a-z]/i) && !$("#password").val().match(/[^a-z0-9]/)){
            
            if($("#password").val().length < 8 || $("#password").val().length > 14 ){
            //alert('密碼長度需為8-14字元英數字結合');
            $("#regi_error_msg").text("密碼長度需為8-14字元英數字結合");
            $("#password_icon").hide();
            //break;
            }
            //alert('ok');
            $("#password_icon").show();
        }else{
            //alert('密碼長度需為8-14字元英數字結合');
            $("#regi_error_msg").text("密碼長度需為8-14字元英數字結合");
            $("#password").val("");
            $("#password_icon").hide();

        }      
});

$("#repassword").blur(function(){
    //alert($("#password").val().length);
        
       if($("#repassword").val() != $("#password").val() ){
            //alert('密碼必須要一致');
            $("#regi_error_msg").text("密碼必須要一致");
            $("#repassword").val("");
            $("#repassword_icon").hide();
       }else{
            //if(("#repassword").val() != ""){
                $("#repassword_icon").show();
           // }    
       }
});


$("#mail").blur(function(){
    //alert($("#password").val().length);
        
    var reg = /^[^\s]+@[^\s]+\.[^\s]{2,3}$/;
  if (reg.test($("#mail").val())) {
      $("#mail_icon").show();
  }else{
      $("#mail_icon").hide();
  }
});

$("#submitbtn_1").click(function(){
    //alert($("#repassword_icon").is(":visible"));
    //return false;
   if($("#mail_icon").is(":visible") && $("#password_icon").is(":visible") && $("#repassword_icon").is(":visible")){
        if($("#agree").is(":checked")){
            return true;
        }else{
            //alert("請勾選同意網站使用條款！");
            $("#regi_error_msg").text("請勾選同意網站使用條款！");
            return false;

        }
   }else{
        //alert("請確定上述欄位填打正確！");
        $("#regi_error_msg").text("請確定欄位填打正確！");
        return false;
   }
  
});

</script>
<script type="text/javascript" src="<?php echo site_url()?>assets/js/fb.js?t=<?=$t?>"></script>
</html>

