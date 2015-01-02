<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
    <title>Young Talent - 註冊步驟2</title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/reset.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/register2.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/css/jquery.autocomplete.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/css/mysite.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/register2.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery.twzipcode.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/index.js"></script>
</head>
<body>
    <div id="maincontain">
        <div id="contentbox">
            <?php $this->load->view('_blocks/_header')?>
            <div id="editbox">
                <div class="step2"></div>
                <div class="reight">
                    
                    <form action="<?php echo site_url()?>/register/step2_save/" method="POST" >                    
                        <input type="hidden" name="account" value="<?php echo $account ?>" />
                        <input type="hidden" name="token" value="<?php echo $token ?>" />
                        <div class="area_div" id="area_div_2">
                            <div class="nameinfo">
                                <div class="left">
                                    <p>姓名</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1"><input type="text" name="name" id="name" value=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sexinfo">
                                <div class="left">
                                    <p>性別</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1">
                                            <input type="radio" name="sex" value="1" checked><span>&nbsp;&nbsp;男</span>
                                            <input type="radio" name="sex" value="0"><span>&nbsp;&nbsp;女</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- *** -->
                            <div class="birthdayinfo">
                                <div class="left">
                                    <p>生日</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1"><input type="text" name="birth" id="birth" value="" placeholder="西元年-月-日" /></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- *** -->
                            <div class="phoneinfo">
                                <div class="left">
                                    <p>聯絡電話</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1"><input type="text" name="contact_tel" id="contact_tel" value=""></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="addressinfo">
                                <div class="left">
                                    <p>聯絡地址</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1">
                                            <div id="twzipcode"></div>
                                            <input type="text" name="address" id="address" placeholder="地址" value="">
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                            <!-- *** -->
                            <div class="schoolinfo">
                                <div class="left">
                                    <p>學校</p>
                                </div>
                                <div class="reight">
                                    <ul class="schoollist">
                                        <li class="l1">
                                            <input type="text" class="school" name="school_id_1" id="school_id_1"  value=""><br>
                                            <div class="box">
                                                <input type="radio" class="schoolstate" name="school_state_1" value="G" checked>
                                                <span>畢業</span>
                                                <input type="radio" class="schoolstate" name="school_state_1" value="A">
                                                <span>在學</span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div id="addschool">新增一筆學校</div>
                                </div>
                               
                            </div>  

                        </div>    
                        <div class="btn_div" id="btn_div_2">
                            <input class="step_btn" type="button" name="step2_next" id="step2_next" value="下一步" style="margin-left:400px"/>
                            <p class="step_text" style="margin-right:100px">
                                 第二步，共四步
                            </p>
                        </div>       
                        <!-- *** -->
                        
                            
                        <!-- *** -->
                        <div class="area_div" id="area_div_3">
                            <div class="dislikeworkingbox">
                                <div class="left">
                                    <p>不想就業的類別</p>                                
                                </div>
                                <table > 
                                     <?php for ($i=0;$i<sizeof($job_cate_list);$i=$i+2): ?>
                                        <tr height="20">
                                            <td width="200"><input type="checkbox" name="exclude_cate[]" value="<?php echo $job_cate_list[$i]->code_id ?>" 
                                                ><?php echo $job_cate_list[$i]->code_name ?></td>
                                            <td><input type="checkbox" name="exclude_cate[]" value="<?php echo $job_cate_list[$i+1]->code_id ?>"                                                
                                                > <?php echo $job_cate_list[$i+1]->code_name ?></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    <?php endfor ?>
                                </table>
                            </div>
                            <div class="skillinfo">
                                <div class="left">
                                    <p>我會的技能</p>
                                </div>
                                <div class="reight">
                                    <table >
                                        <?php for ($i=0;$i<sizeof($skill_list);$i=$i+2): ?>
                                        <tr height="20">
                                            <td width="200"><input type="checkbox" name="skill[]" value="<?php echo $skill_list[$i]->code_id ?>"
                                                ><?php echo $skill_list[$i]->code_name ?></td>
                                            <td><input type="checkbox" name="skill[]" value="<?php echo $skill_list[$i+1]->code_id ?>"
                                                > <?php echo $skill_list[$i+1]->code_name ?></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    <?php endfor ?>
                                    </table>
                                </div>
                            </div>  
                            <div class="jobinfo">
                                <div class="left">
                                    <p>工作經驗</p>
                                </div>
                                <div class="reight">
                                    <ul class="joblist">
                                        <li class="l1">
                                            <input type="text" name="job_company_name_1" value="" placeholder="公司" /><br>
                                            <input type="text" name="job_title_1" value="" placeholder="職稱" /><br>
                                            <input type="text" class="datestart datepicker1" name="job_start_date_1" placeholder="西元年-月-日" value="">
                                            &nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;
                                            <input type="text" class="dateend datepicker1" name="job_end_date_1" placeholder="西元年-月-日" value=""><br>
                                            <b>在職中，離職日期請留空</b>
                                        </li>
                                    </ul>
                                    <div id="addjob">新增一筆經驗</div>
                                </div>
                            </div>    
                             <div class="langinfo">
                                <div class="left"> 
                                    <p>語言能力</p>
                                </div>
                                <div class="reight">
                                    <ul class="langlist">
                                         <?php  
                                            $count = 1;
                                            if(isset($data["langs"]))
                                            foreach ($data["langs"] as $key => $value) {
                                            // print_r($value);
                                        ?>   
                                            <li class="l<?php echo $count ?>">
                                                <input type="text" class="lang" name="lang_id_<?php echo $count ?>" value="<?php echo $value->lang_name ?>"><br>
                                                <div class="box"> 
                                                <?php foreach ($level_list as $key2 => $value2): ?>
                                                    <input type="radio" class="levelstate" name="level_state_<?php echo $count ?>" value="<?php echo $value2->code_id ?>"
                                                     <?php echo $value2->code_id==$value->level_id?"checked":""; ?> >
                                                    <span><?php echo $value2->code_name ?></span>
                                                <?php endforeach ?>
                                                </div>
                                            </li>

                                         <?php
                                              $count++;  
                                            }
                                        ?>       
                                    </ul> 
                                <div id="addlang">新增一筆語言</div>
                            </div>
                            </div>                       
                        </div>

                        <!-- *** -->


                        <div class="btn_div" id="btn_div_3">
                            <input class="step_btn" type="button" name="step3_prev" id="step3_prev" value="上一步" style="margin-left:200px" />
                            <input class="step_btn" type="button" name="step3_next" id="step3_next" value="下一步" style="margin-left:400px"/>
                            <p class="step_text" style="margin-right:100px">
                                 第三步，共四步
                            </p>
                        </div>

                            <!-- *** -->
                        <div class="area_div" id="area_div_4">
                            <div class="employmentstatusinfo">
                                <div class="left">
                                    <p>就業狀態</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1">
                                            <input type="radio" name="now_status" value="0" checked><span>&nbsp;&nbsp;在職</span>
                                            <input type="radio" name="now_status" value="0"><span>&nbsp;&nbsp;在學</span>
                                            <input type="radio" name="now_status" value="0"><span>&nbsp;&nbsp;待業</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- *** -->
                            <!-- *** -->
                            <div class="employmentstatusinfo">
                                <div class="left">
                                    <p>尋找工作</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1">
                                            <input type="radio" name="find_kind" value="0"  checked><span style="width:auto;">&nbsp;&nbsp;我目前在找打工&nbsp;&nbsp;</span>
                                            <input type="radio" name="find_kind" value="1"  ><span style="width:auto;">&nbsp;&nbsp;我目前在找全職工作</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- *** -->
                            <div class="recommendedinfo">
                                <div class="left">
                                    <p>推薦人</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1"><input type="text" name="recommended" value="<?php echo $recommended_id ?>"></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- *** -->
                            <div class="aboutmeinfo">
                                <div class="left">
                                    <p>關於自己</p>
                                </div>
                                <div class="reight">
                                    <ul>
                                        <li class="l1"> 
                                            <textarea name="about_self" id="about_self" placeholder="介紹一下你自已吧" rows="3" cols="40" maxlength="100"></textarea>
                                        </li>
                                        <li class="l1">
                                            <input type="file" name="about_att" id="file" size="20" class="ifile"
                                                 onchange="this.form.upfile.value=this.value.substr(this.value.lastIndexOf('\\')+1);" 
                                                 style="position:absolute;opacity:0;filter:alpha(opacity=0);">                                  
                                            <input type="button" class="upfilebtn" value="上傳附檔" onclick="this.form.about_att.click();">
                                            <input type="text" name="upfile" class="upfile" size="20" readonly>
                                            <br> 
                                            <p style="font-size:12px; color:#999;">支援格式：.doc .docx .pdf .jpg .png</p>
                                        </li>
                                    </ul> 
                                </div>
                            </div>
                        </div>

                        <div class="btn_div" id="btn_div_4">
                            <input class="step_btn" type="button" name="step4_prev" id="step4_prev" value="上一步" style="margin-left:200px" />
                            <input class="step_btn" type="submit" value="送出" style="margin-left:400px"/>
                            <p class="step_text" style="margin-right:100px">
                                 第四步，共四步
                            </p>
                        </div>

                    </form>
                </div>
            </div>
            <div id="fbbox">
                <?php $this->load->view('_blocks/_facebook')?>
            </div>
        </div>
        <?php $this->load->view('_blocks/_footer')?>
    </div>
    <script type="text/javascript">

    function replaceAll(find, replace, str) {
              return str.replace(new RegExp(find, 'g'), replace);
            }
           

            jQuery(document).ready(function($) {

                $('.area_div').hide();
                $('.btn_div').hide();

                $('#area_div_2').show();
                $('#btn_div_2').show();


                $('#step2_next').click(function(){
                    $('.area_div').hide();
                    $('.btn_div').hide();
                    $('#area_div_3').show();
                    $('#btn_div_3').show();
                });

                $('#step3_next').click(function(){
                    $('.area_div').hide();
                    $('.btn_div').hide();
                    $('#area_div_4').show();
                    $('#btn_div_4').show();
                });

                $('#step3_prev').click(function(){
                    $('.area_div').hide();
                    $('.btn_div').hide();
                    $('#area_div_2').show();
                    $('#btn_div_2').show();
                });

                $('#step4_prev').click(function(){
                    $('.area_div').hide();
                    $('.btn_div').hide();
                    $('#area_div_3').show();
                    $('#btn_div_3').show();
                });


                $('#twzipcode').twzipcode({
                    countyName: 'address_city',
                    districtName: 'address_area',
                    zipcodeName: 'address_zip',
                    'css': [
                                'addr-county', //縣市
                                'addr-distrcit',  // 鄉鎮市區
                                'addr-zip' // 郵遞區號
                            ]
                });


                var school_data; 
                var lang_data;

                $.ajax({
                url: '<?php echo site_url(); ?>register/school' ,
                cache: false
                }).done(function (data) { 
                    school_data = $.parseJSON(data); 
                    $("#school_id_1").autocomplete(school_data, {matchContains: true});  
                });

                 $.ajax({
                url: '<?php echo site_url(); ?>register/lang' ,
                cache: false
                }).done(function (data) { 
                    lang_data = $.parseJSON(data); 
                    // alert(school_data);
                    // $("#school_id_1").autocomplete(school_data, {matchContains: true});  
                    // alert(school_data);
                    $(".lang").autocomplete(lang_data, {matchContains: true}); 
                });

                 DATA.dom.addschool=$("#addschool");
                 DATA.dom.schoollist=$("ul.schoollist");

                 DATA.dom.addjob=$("#addjob");
                 DATA.dom.joblist=$("ul.joblist");

                 DATA.dom.addlang=$("#addlang");
                 DATA.dom.langlist=$("ul.langlist");

                 DATA.dom.addschool.click(function(){
                   num=DATA.dom.schoollist.children("li").size()+1;  
                   schoolItem = "<li class='l"+num+"'><input type='text' class='school' name='school_id_"+num+"' id='school_id_"+num+"' value=''><br><div class='box'><input type='radio' class='schoolstate' name='school_state_"+num+"' value='' checked><span>畢業</span><input type='radio' class='schoolstate'  name='school_state_"+num+"' value=''><span>在學</span></div></li>";  
                   DATA.dom.schoollist.append(schoolItem); 

                   $("#school_id_"+num).autocomplete(school_data, {matchContains: true});  
                });

                DATA.dom.addjob.click(function(){
                   num=DATA.dom.joblist.children("li").size()+1; 
                   jobItem ="<li class='l"+num+"'><input type='text' name='job_company_name_"+num+"' value='' placeholder='公司' /><br><input type='text' name='job_title_"+num+"' value='' placeholder='職稱' /><br><input type='text' class='datestart datepicker"+num+"' name='job_start_date_"+num+"' placeholder='西元年-月-日' value=''>&nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;<input type='text' class='dateend datepicker"+num+"' name='job_end_date_"+num+"' placeholder='西元年-月-日' value=''><br><b>在職中，離職日期請留空</b></li>";
                   DATA.dom.joblist.append(jobItem);
                   $( ".datepicker"+num ).datepicker({ dateFormat: 'yy-mm-dd' });
                });

                <?php

                $level_option = '';

                foreach ($level_list as $key => $value) {                    
                    $level_option .="<input type='radio' class='levelstate' name='level_state_{jsNum}' value='$value->code_id' checked><span>$value->code_name</span>";
                }

                ?>

                DATA.dom.addlang.click(function(){
                   num=DATA.dom.langlist.children("li").size()+1;  

                   // var thisOption = "<?php echo $level_option ?>".replace('{jsNum}',num);
                   var thisOption = replaceAll('{jsNum}',num,"<?php echo $level_option ?>");
                   console.log(thisOption);
                   langItem = "<li class='l"+num+"'><input type='text' class='lang' name='lang_id_"+num+"' id='lang_id_"+num+"' value=''><br><div class='box'></div>"+thisOption+"</li>";  
                   DATA.dom.langlist.append(langItem); 

                   // $("#school_id_"+num).autocomplete(school_data, {matchContains: true});
                   $(".lang").autocomplete(lang_data, {matchContains: true});   
                });

            });
           

    </script>
</body>
</html>

