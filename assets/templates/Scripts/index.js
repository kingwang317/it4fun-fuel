var DATA={};
jQuery(document).ready(function ($) {
    DATA.winW = $(window).width();
    DATA.winH = $(window).height();
    DATA.dom={};
    DATA.dom.loginbox=$("#loginbox");
    DATA.dom.logdata=$("#logdata");
    DATA.dom.wall=$("#wall");
    DATA.dom.logindatabox=$("#logindatabox");



    DATA.dom.loginbox.click(function(){
       
    });

    DATA.dom.logdata.click(function(){
       DATA.dom.logindatabox.css({"left":(DATA.winW-DATA.dom.logindatabox.width())/2+"px" , "top":(DATA.winH-DATA.dom.logindatabox.height())/2+"px"});
       DATA.dom.logindatabox.fadeIn();
    });

    DATA.dom.logindatabox.find("div.close").click(function(){
       DATA.dom.logindatabox.css({"left":(DATA.winW-DATA.dom.logindatabox.width())/2+"px" , "top":(DATA.winH-DATA.dom.logindatabox.height())/2+"px"});
       DATA.dom.logindatabox.fadeOut();
    });

});