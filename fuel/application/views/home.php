<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/style.css" type="text/css" media="all" >
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&appId=787884584567146&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script>


</head>

<body>
    <div id="maincontain">
        <div id="contentbox">
            
            <?php $this->load->view('_blocks/_header')?>

            <div id="bodybox01">
                <div class="top">
                    <ul>
                        <li class="subject">合作夥伴</li>
                        <li class="logo1"><img src="<?php echo site_url()?>assets/templates/images/company/logo1.png"></li>
                        <li class="logo2"><img src="<?php echo site_url()?>assets/templates/images/company/logo2.png"></li>
                        <li class="logo3"><img src="<?php echo site_url()?>assets/templates/images/company/logo3.png"></li>
                        <li class="logo4"><img src="<?php echo site_url()?>assets/templates/images/company/logo4.png"></li>
                        <li class="logo5"><img src="<?php echo site_url()?>assets/templates/images/company/logo5.png"></li>
                    </ul>
                </div>
                <div class="bottom">
                    <h2>札根青春、成就夢想</h2>
                    <p>
                    問及在過去的工讀經驗中，是否與自已所學有關?59%的受訪者表示並未進入與所學相關的工作領域工讀。但有趣的是詢問他們願意選擇「薪資較高，但與所學關連性較低」的工作，或是選擇「薪資較低，但與所學關連性較高」的工作時，有五成以上的大學生，研究生願意選擇後者，也就是希望能從事「能發揮專長的工讀工作」。針對這項結果，104人力銀行認
                    </p>
                </div>
            </div>
            <div id="bodybox02">
                <img src="<?php echo site_url()?>assets/templates/images/pic/pic1.png">
            </div>
            <div id="bodybox03">
                <img src="<?php echo site_url()?>assets/templates/images/pic/pic2.png">
            </div>
            <div id="bodybox04">
                <p class="subject">不用麻煩的履歷，只需要你的基本資料</p>
                <p class="content">許多工作其實都不用工作經驗，也用不到履歷表。填寫履歷就成了一個多餘又麻煩的事情，那何不把它省略呢？<br> 因此，我們只需要您的基本資料，就可以幫您找到許多打工機會以及初階工作，而且這一切都是免費的!好工作，不找嗎?</p>
            </div>
            <div id="bodybox05">
                <p class="subject">經過認證的職缺，我們幫你把關</p>
                <p class="content">許多工作其實都不用工作經驗，也用不到履歷表。<br>填寫履歷就成了一個多餘又麻煩的事情，那何不把它省略呢?</p>
            </div>
            <div id="bodybox06">
                <img src="<?php echo site_url()?>assets/templates/images/pic/pic5.png">
            </div>
        </div>
        <?php $this->load->view('_blocks/_footer')?>
        
    </div>
    <!-- *** -->
    <div id="wall"></div>
    <div id="logindatabox">
        <form action="<?php echo site_url()?>/register/step1_save/" method="POST" >
            <div class="close"></div>
            <div class="subject">快速註冊</div>
            <div class="line"></div>
            <div class="step1"><img src="<?php echo site_url()?>assets/templates/images/icon/step1.png"></div>
            <div class="account">
                <div class="title">電子郵件</div>
                <div class="input"><input type="text" class="mail" name="mail" id="mail" value=""></div>
                <div class="icon" id="mail_icon" ><div class="ok"></div></div>
            </div>
            <div class="password">
                <div class="title">密碼</div>
                <div class="input"><input type="password" class="password" name="password" id="password"  value=""></div>
                <div class="icon" id="password_icon" ><div class="ok"></div></div>
            </div>
            <div class="confirmpassword">
                <div class="title">確認密碼</div>
                <div class="input"><input type="password" class="confirmpassword" name="repassword" id="repassword" value=""></div>
                <div class="icon" id="repassword_icon"><div class="ok"></div></div>
            </div>
            <div class="agree">
                 <p>我同意<a href="#">網站使用條款</a></p><input type="checkbox" name="agree" id="agree" >
            </div>
            <div class="submit">
                <input type="submit" class="submitbtn" name="submitbtn_1" id="submitbtn_1" value="送出">
            </div>
            <div class="fbbox">
                <p>使用臉書登入，又快又方便 &nbsp;&nbsp;&nbsp;&nbsp;</p> 
                <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>

            </div>
        </form>
    </div>

<script type="text/javascript">
$("#mail_icon").hide();
$("#password_icon").hide();
$("#repassword_icon").hide();

$("#password").blur(function(){
    //alert($("#password").val().length);
        
        if($("#password").val().match(/\d/) && $("#password").val().match(/[a-z]/i) && !$("#password").val().match(/[^a-z0-9]/)){
            
            if($("#password").val().length < 8 || $("#password").val().length > 14 ){
            alert('密碼長度需為8-14字元英數字結合');
            $("#password_icon").hide();
            //break;
            }
            //alert('ok');
            $("#password_icon").show();
        }else{
            alert('密碼長度需為8-14字元英數字結合');
            $("#password").val("");
            $("#password_icon").hide();

        }      
});

$("#repassword").blur(function(){
    //alert($("#password").val().length);
        
       if($("#repassword").val() != $("#password").val() ){
            alert('密碼必須要一致');
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
            alert("請勾選同意網站使用條款！");
            return false;

        }
   }else{
        alert("請確定上述欄位填打正確！");
        return false;
   }
  
});


</script>
</body>
</html>

