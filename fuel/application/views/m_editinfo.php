<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,height=device-height, initial-scale=0.5, maximum-scale=0.5, minimum-scale=0.5 , user-scalable=no"  />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title></title>    
    <link rel="stylesheet" href="<?php echo site_url()?>assets/mobile_template/style.css" type="text/css" media="all" >
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/lib/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="<?php echo site_url()?>assets/mobile_template/Scripts/index.js"></script>
</head>

<body>
    <div id="maincontain">
        <div id="myinfobox">     
            <h2 class="titlebox"><img src="images/icon/myinfo.png"></h2>       
            <table class="block1">
                <tr>
                    <td><span>就業狀態</span></td>
                    <td>
                        <select>
                            <option>在職中</option>
                        </select>
                    </td>
                </tr>
                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>                  
                <tr>
                    <td><span>尋找工作</span></td>
                    <td>
                        <select>
                            <option>找工作</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="headpic">
                <img src="images/pic/pic9.png">
            </div>
            <a class="uploadpic" href="#">上傳圖片</a>
            <table class="block2">
                <tr>
                    <td><span>姓名</span></td>
                    <td>
                       <input type="text" class="name"> 
                    </td>
                </tr>               
                <tr>
                    <td><span>性別</span></td>
                    <td>
                        <select>
                            <option>男</option>
                            <option>女</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span>生日</span></td>
                    <td>
                        <input type="date"> 
                    </td>
                </tr>
                <tr>
                    <td><span>手機</span></td>
                    <td>
                        <input type="tel"> 
                    </td>
                </tr> 
            </table>

            <table class="block3">
                <tr>
                    <td>聯絡地址</td>                    
                </tr>               
                <tr>
                    <td>
                        <select>
                            <option>台北市</option>
                        </select>
                        &nbsp;&nbsp;
                        <select>
                            <option>信義區</option>
                        </select>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <input type="text" class="address"> 
                    </td>                    
                </tr>
            </table>

            <div class="block4">
                <div class="title">就讀學校 <a class="addbtn" href="#"><img src="images/icon/add.png"></a></div>
                <div class="item">
                    <p class="name">研究所：臺灣大學 兩性研究所</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
                <div class="item">
                    <p class="name">研究所：臺灣大學 兩性研究所</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
            </div>

            <div class="block5">
                <div class="title">不想就業的類別</div>
                <div class="box">
                    <table>
                        <tr>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">門市店員</td>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">作業包裝</td>
                        </tr>
                        <tr>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">餐飲服務</td>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">資料輸入</td>
                        </tr>
                        <tr>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">售票收銀</td>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">直銷保險</td>
                        </tr>
                        <tr>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">行政助理</td>
                            <td width="70" class="chbox"><input type="checkbox"></td>
                            <td width="225">作業勞動</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="block6">
                <div class="title">我會的技能</div>
                <div class="box"></div>
            </div>

            <div class="block7">
                <div class="title">工作經驗 <a class="addbtn" href="#"><img src="images/icon/add.png"></a></div>
                <div class="item">
                    <p class="name">PropleSearch : Intern  2014</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
                <div class="item">
                    <p class="name">PropleSearch : Intern  2014</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
            </div>

            <div class="block8">
                <div class="title">語言能力 <a class="addbtn" href="#"><img src="images/icon/add.png"></a></div>
                <div class="item">
                    <p class="name">英文：佳（TOEIC900）</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
                <div class="item">
                    <p class="name">英文：佳（TOEIC900）</p>
                    <p class="btn"><a class="delbtn" href="#"></a></p>
                </div>
            </div>

            <div class="block9">
                <table>
                    <tr>
                        <td width="105">代碼</td>
                        <td width="485"><input type="text"></td>
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
                    <textarea></textarea>
                </div>
                <input type="file" name="file" id="file" size="20" class="ifile"
                                     onchange="
                                        this.form.upfile.value=this.value.substr(this.value.lastIndexOf('\\')+1);
                                      " style="position:absolute;opacity:0;filter:alpha(opacity=0);">
                <input type="button" class="upfilebtn" value="上傳附檔" onclick="this.form.file.click();">
                <input type="text" name="upfile" class="upfile" size="20" readonly>
                <p style="font-size:32px; line-height:58px; color:#999;">支援格式：.doc .docx .pdf .jpg .png</p>
            </div>




        </div>
    </div>
    <?php $this->load->view('_blocks/_m_menu')?>
</body>
</html>

