<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.css" type="text/css" media="all" >
    <link rel="stylesheet" href="<?php echo site_url()?>assets/css/jquery.autocomplete.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery-ui-1.11.0.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/index.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/templates/Scripts/lib/jquery.twzipcode.min.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="myinfobox">     
            <form action="<?php echo site_url()?>user/do_edit" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="account" value="<?php echo $account ?>" />
            <input type="hidden" name="token" value="<?php //echo $token ?>" />
            <h2 class="titlebox"><img src="<?php echo site_url()?>assets/templates/images/icon/myinfo.png"></h2>       
            <table class="block1">
                <tr>
                    <td><span>就業狀態</span></td>
                    <td>
                        <select name="now_status" class="EmploymentStatus">
                            <option value="0" <?php echo $data[0]->job_status==0?"selected":""; ?> >在職</option>
                            <option value="1" <?php echo $data[0]->job_status==1?"selected":""; ?> >在學</option>
                            <option value="2" <?php echo $data[0]->job_status==2?"selected":""; ?> >待業</option>
                        </select>   
                    </td>
                </tr>
                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>                  
                <tr>
                    <td><span>尋找工作</span></td>
                    <td>
                        <select name="find_kind" class="LookingForWork">
                            <option value="0" <?php echo $data[0]->find_job_kind==0?"selected":""; ?> >我目前在找打工</option>
                            <option value="1" <?php echo $data[0]->find_job_kind==1?"selected":""; ?> >我目前在找全職工作</option>
                        </select> 
                    </td>
                </tr>
            </table>
            <div class="headpic">
                <?php if($data[0]->avatar=="" && $data[0]->fb_account == ""){ ?>
         
                <?php }elseif($data[0]->avatar!=""){ ?>              
                    <img src="<?php echo site_url()."/assets/avatar/".$data[0]->avatar ?>" style="width: 106px;">
                 <?php }elseif($data[0]->fb_account!=""){ ?>
                    <img data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?php echo $data[0]->fb_account  ?>/picture?type=large" style="width: 106px;">
                   
                <?php } ?>
            </div>
            <input type="file" name="avatar" id="avatar">
            <table class="block2">
                <tr>
                    <td><span>姓名</span></td>
                    <td>
                       <input type="text" class="name" name="name" id="name" value="<?php echo $data[0]->name?>">
                    </td>
                </tr>               
                <tr>
                    <td><span>性別</span></td>
                    <td>
                        <select class="sexselect" name="sex">
                            <option value="1" <?php echo $data[0]->sex==1?"selected":""; ?> >男</option>
                            <option value="0" <?php echo $data[0]->sex==0?"checked":""; ?> >女</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span>生日</span></td>
                    <td>
                        <input type="text" name="birth" placeholder="yyyy-MM-dd"  class="birthday" value="<?php echo $data[0]->birth?>">
                    </td>
                </tr>
                <tr>
                    <td><span>手機</span></td>
                    <td>
                        <input type="text" class="phone" name="contact_tel" value="<?php echo $data[0]->contact_tel?>">
                    </td>
                </tr> 
            </table>

            <table class="block3">
                <tr>
                    <td><span>聯絡地址</span></td>                    
                </tr>               
                <tr>
                    <td>
                        <div id="twzipcode"></div>     
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <input type="text" name="address"  class="address" value="<?php echo $data[0]->address?>">
                    </td>                    
                </tr>
            </table>

            <div class="block4">
                <div class="title">就讀學校 <a class="addbtn addschool"><img src="images/icon/add.png"></a></div>
              <!--   <div class="item">
                    <p class="name">研究所：臺灣大學 兩性研究所</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>  -->
               <ul class="schoollist"> 
                 <?php  
                    $count = 1;
                    if(isset($data["schools"]))
                    foreach ($data["schools"] as $key => $value) {
                    // print_r($value);
                ?>   
                    <li class="l<?php echo $count ?>">
                        <input type="text" class="school" name="school_id_<?php echo $count ?>" value="<?php echo $value->school_name ?>"><br>
                        <div class="box">

                            <input type="radio" class="schoolstate" name="school_state_<?php echo $count ?>" value="G" <?php echo $value->is_attend==0?"checked":""; ?> >
                            <span>畢業</span>
                            <input type="radio" class="schoolstate" name="school_state_<?php echo $count ?>" value="A" <?php echo $value->is_attend==1?"checked":""; ?> >
                            <span>在學</span>
                        </div>
                    </li>

                 <?php
                      $count++;  
                    }
                ?>       
                </ul>
            </div>

            <div class="block5">
                <div class="title">不想就業的類別</div>
                <div class="box">
                    <table>
                        <?php for ($i=0;$i<sizeof($job_cate_list);$i=$i+2): ?>
                            <tr height="20">
                                <td width="200"><input type="checkbox" name="exclude_cate[]" value="<?php echo $job_cate_list[$i]->code_id ?>"
                                    <?php if (isset($exclude_cate) && in_array($job_cate_list[$i]->code_id,$exclude_cate)): ?>
                                        checked
                                    <?php endif ?>
                                    ><?php echo $job_cate_list[$i]->code_name ?></td>
                                <td><input type="checkbox" name="exclude_cate[]" value="<?php echo $job_cate_list[$i+1]->code_id ?>"
                                    <?php if (isset($exclude_cate) && in_array($job_cate_list[$i+1]->code_id,$exclude_cate)): ?>
                                        checked
                                    <?php endif ?>
                                    > <?php echo $job_cate_list[$i+1]->code_name ?></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        <?php endfor ?>
                    </table>
                </div>
            </div>

            <div class="block5">
                <div class="title">我會的技能</div>
                <div class="box">
                    <table> 
                        <?php for ($i=0;$i<sizeof($skill_list);$i++): ?>
                            <tr height="20">
                                <td width="400"><input type="checkbox" name="skill[]" value="<?php echo $skill_list[$i]->code_id ?>"
                                    <?php if (isset($user_skill_list) && in_array_field($skill_list[$i]->code_id,'code_id',$user_skill_list)): ?>
                                        checked
                                    <?php endif ?>
                                    ><?php echo $skill_list[$i]->code_name ?></td>
                                
                            </tr>
                        <?php endfor ?>
                    </table>
                </div>
            </div>

            <div class="block7">
                <div class="title">工作經驗 <a class="addbtn addjob"><img src="images/icon/add.png"></a></div>
               <!--  <div class="item">
                    <p class="name">PropleSearch : Intern  2014</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
                <div class="item">
                    <p class="name">PropleSearch : Intern  2014</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div> -->
                <ul class="joblist">      
                <?php  
                    $count = 1;
                    
                    if(isset($data["exp"]))
                    foreach ($data["exp"] as $key => $value) {
                    
                ?>    
                    <li class="l<?php echo $count ?>">
                        <input type="text" name="job_company_name_<?php echo $count ?>" value="<?php echo $value->company_name ?>" placeholder="公司" /><br>
                        <input type="text" name="job_title_<?php echo $count ?>" value="<?php echo $value->job_title ?>" placeholder="職稱" /><br>
                        <input type="text" class="datestart datepicker<?php echo $count ?>" name="job_start_date_<?php echo $count ?>" placeholder='西元年-月-日' value="<?php echo $value->job_start_date ?>">
                        &nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;&nbsp;
                        <input type="text" class="dateend datepicker<?php echo $count ?>" name="job_end_date_<?php echo $count ?>" placeholder='西元年-月-日' value="<?php echo $value->job_end_date ?>"><br>
                        <b>在職中，離職日期請留空</b>
                    </li>
                <?php
                    $count++;  
                    }
                ?>           
                       
                </ul>
            </div>

            <div class="block8">
                <div class="title">語言能力 <a class="addbtn addlang"<img src="images/icon/add.png"></a></div>
                <!-- <div class="item">
                    <p class="name">英文：佳（TOEIC900）</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
                <div class="item">
                    <p class="name">英文：佳（TOEIC900）</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div> -->                
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
            </div>

            <div class="block9">
                <table>
                    <tr>
                        <td width="105">代碼</td>
                        <td width="485">
                            <input type="text" class="code" name="recommended" value="<?php echo $recommended_id ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width="105">備註</td>
                        <td width="485"><input type="text"></td>
                    </tr>
                </table>
            </div>

            <div class="block10">
                <div class="title">關於自己（限150字）</div>
                <div class="box">
                    <textarea name="about_self" id="about_self" placeholder="介紹一下你自已吧" rows="3" cols="40" maxlength="100"><?php echo $data[0]->about_self ?></textarea>
                </div>
                <input type="file" name="about_att" id="file" size="20" class="ifile" 
                    onchange="this.form.upfile.value=this.value.substr(this.value.lastIndexOf('\\')+1);" 
                    style="position:absolute;opacity:0;filter:alpha(opacity=0);" />                                  
                <input type="button" class="upfilebtn" value="上傳附檔" onclick="this.form.about_att.click();">
                <input type="text" name="upfile" class="upfile" size="20" readonly>
                <br>
                <input type="hidden" value="<?php echo $data[0]->about_att; ?>" name="exist_about_att" /> 
                <?php if (isset($data[0]->about_att) && !empty($data[0]->about_att)): ?> 
                    <a href="<?php echo site_url()."assets/about_att/".$data[0]->about_att; ?>" target="_blank" ><?php echo $data[0]->about_att ?></a>
                    <input type="checkbox" name="about_att_delete" />刪除
                <?php endif ?> 
                <p style="font-size:12px; color:#999;">支援格式：.doc .docx .pdf .jpg .png</p> 
            </div>

            <div class="block10">
                <input type="Submit" name="Submit" class="Submit" value="完成">
            </div>
             </form>
        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
     <script type="text/javascript">
           function replaceAll(find, replace, str) {
              return str.replace(new RegExp(find, 'g'), replace);
            }

           jQuery(document).ready(function($) {

                $( ".birthday").datepicker({ dateFormat: 'yy-mm-dd' });
             
                $('#twzipcode').twzipcode({
                    countyName: 'address_city',
                    districtName: 'address_area',
                    zipcodeName: 'address_zip',
                    countySel: '<?php echo $data[0]->address_city?>',
                    districtSel: '<?php echo $data[0]->address_area?>',
                    zipcodeSel: '<?php echo $data[0]->address_zip?>',
                    
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
                    // alert(school_data);
                    // $("#school_id_1").autocomplete(school_data, {matchContains: true});  
                    // alert(school_data);
                    $(".school").autocomplete(school_data, {matchContains: true}); 
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

                DATA.dom.addschool=$(".addschool");
                DATA.dom.schoollist=$("ul.schoollist");


                DATA.dom.addjob=$(".addjob");
                DATA.dom.joblist=$("ul.joblist");

                DATA.dom.addlang=$(".addlang");
                DATA.dom.langlist=$("ul.langlist");


                DATA.dom.addschool.click(function(){
                   num=DATA.dom.schoollist.children("li").size()+1;  
                   schoolItem = "<li class='l"+num+"'><input type='text' class='school' name='school_id_"+num+"' id='school_id_"+num+"' value=''><br><div class='box'><input type='radio' class='schoolstate' name='school_state_"+num+"' value='' checked><span>畢業</span><input type='radio' class='schoolstate'  name='school_state_"+num+"' value=''><span>在學</span></div></li>";  
                   DATA.dom.schoollist.append(schoolItem); 

                   // $("#school_id_"+num).autocomplete(school_data, {matchContains: true});
                   $(".school").autocomplete(school_data, {matchContains: true});   
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

