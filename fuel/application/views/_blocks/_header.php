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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52531873-1', 'auto');
  ga('send', 'pageview');

</script>
