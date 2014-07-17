<?php echo css($this->config->item('resume_css'), 'resume')?> 

<section class="main-content">
<section class="wrapper" style="margin:0px">
	<div id="dialog-confirm" title="刪除確認?">
	  <p></p>
	</div>

	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：履歷列表</li>
			</ul>
		</div>
	</div>

	<div class="row" style="">
	    <div class="col-md-2 sheader"><h4>履歷列表</h4></div>
	    <div class="col-md-10 sheader">
			<div class="form-inline">
				<div class="form-group">
					姓名
				</div>
				<div class="form-group">
					<input type="text" class="form-control m-bot15" placeholder="Search..." value="<?php echo $search_name; ?>" name="search_name"/>
				</div>
			 
			</div>
			<div class="form-inline">
				<div class="form-group">
					帳號
				</div>
				<div class="form-group">
					<input type="text" class="form-control m-bot15" placeholder="Search..." value="<?php echo $search_account; ?>" name="search_account"/>
				</div>
			 
			</div>
			<div class="form-inline">
				<div class="form-group">
					推薦人
				</div>
				<div class="form-group">
					<input type="text" class="form-control m-bot15" placeholder="Search..." value="<?php echo $search_recommended; ?>" name="search_recommended"/>
				</div>
			 
			</div>
			<div class="form-inline">
				<div class="form-group">
					註冊日期（起）
				</div>
				<div class="form-group">
					<input type="text" class="form-control m-bot15" placeholder="註冊日期（起）" value="<?php echo $create_time_s; ?>" id="create_time_s" name="create_time_s"/>
				</div>
			 
			</div>
			<div class="form-inline">
				<div class="form-group">
					註冊日期（迄）
				</div>
				<div class="form-group"> 
					<input type="text" class="form-control m-bot15" placeholder="註冊日期（迄）" value="<?php echo $create_time_e; ?>" id="create_time_e" name="create_time_e"/>
				</div> 
			</div>
			<div class="form-inline">
				 
				<div class="form-group">
					<button type="submit" class="btn btn-info m-bot15">搜尋</button>
				</div>
			</div>
	    </div>
	</div> 

	<div class="row notify" style="margin:10px 10px; font-size: 12px; display:none">
		<div class="bs-docs-example">
		  <div class="alert fade in">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    <span>刪除失敗</span>
		  </div>
		</div>
	</div>

	<div class="row">
		<section class="panel">
			<header class="panel-heading">
				<button class="btn btn-info" type="button" onClick="aHover('<?php echo $create_url;?>')">新增履歷</button>
			</header>
			<div class="alert alert-success" role="alert">
				<strong>共<?php echo $total_rows;?>筆</strong>
			</div>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" id="select-all"/>
							</label>
						</th>
						<th>姓名</th>
						<th>FB ID</th>
						<th>電話</th>
						<th>年齡</th>
						<th>地址</th>
						<th>電子郵件</th>
						<th>註冊日期</th>
						<th>刪除</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($results))
					{
						foreach($results as $key=>$rows)
						{

					?>
					<tr>
						<td>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" name="account[]" account="<?php echo $rows->account?>"/>
							</label>
						</td>
						<td><a href="<?php echo $edit_url.$rows->account?>"><?php echo $rows->name?></a></td>
						<td><a target="_blank" href="<?php echo "http://www.facebook.com/".$rows->fb_account?>"><?php echo $rows->fb_account?></a></td>
						<td><?php echo $rows->contact_tel?></td>
						<td>
					       <?php 
                             $birthDate = explode("-", $rows->birth);
                              //get age from date or birthdate
                              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                ? ((date("Y") - $birthDate[0]) - 1)
                                : (date("Y") - $birthDate[0]));
                            	echo $age;

                            ?>
						</td>
						<td><?php echo "[$rows->address_zip] $rows->address_city $rows->address_area $rows->address" ?></td>
						<td><?php echo $rows->contact_mail?></td>
						<td><?php echo $rows->create_time?></td>
						<td>
							<button class="btn btn-xs btn-danger del" type="button" onclick="dialog_chk('<?php echo $rows->account?>')">刪除</button>
						</td>
					</tr>
					<?php
						}
					}
					else
					{
					?>
						<tr>
							<td colspan="8">No results.</td>
						</tr>
					<?php
					}
					?>
				</tobdy>
			</table>
		</section>
	</div>
	<div style="text-align:center">
	  <ul class="pagination">
		<?php echo $page_jump?>
	  </ul>
	</div>
</section>
</section>
<?php echo js($this->config->item('codekind_javascript'), 'codekind')?>
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	$j("document").ready(function($) {

		$('#create_time_e').datepicker({dateFormat: 'yy-mm-dd'});
		$('#create_time_s').datepicker({dateFormat: 'yy-mm-dd'});

		$j("#select-all").click(function() {

		   if($j("#select-all").prop("checked"))
		   {
				$j("input[name='account[]']").each(function() {
					$j(this).prop("checked", true);
				});
		   }
		   else
		   {
				$j("input[name='account[]']").each(function() {
					$j(this).prop("checked", false);
				});     
		   }
		});

		$j("button.delall").click(function(){
			var accounts = [];
			var j = 0;
			var postData = {};
			var api_url = '<?php echo $multi_del_url?>';
			$j("input[name='account[]']").each(function(i){
				if($j(this).prop("checked"))
				{
					accounts[j] = $j(this).attr('account');
					j++;
				}
			});

			postData = {'accounts': accounts};
			$j( "#dialog-confirm p" ).text('您確定要刪除嗎？');
			$j( "#dialog-confirm" ).dialog({
			  resizable: false,
			  height:150,
			  modal: true,
			  buttons: {
			    "Delete": function() {
					$j.ajax({
						url: api_url,
						type: 'POST',
						async: true,
						crossDomain: false,
						cache: false,
						data: postData,
						success: function(data, textStatus, jqXHR){
							var data_json=jQuery.parseJSON(data);
							console.log(data_json);
							$j( "#dialog-confirm" ).dialog( "close" );
							if(data_json.status == 1)
							{
								$j(".notify").find("span").text('刪除成功');
								$j(".notify").fadeIn(100).fadeOut(1000);
								setTimeout("update_page()", 500);
							}
							else
							{
								$j(".notify").find(".alert").addClass('alert-error');
								$j(".notify").find(".alert").addClass('alert-block');
								$j(".notify").find("span").text('刪除失敗');
								$j(".notify").slideDown(500).delay(1000).fadeOut(200);
							}

						},
					});
			    },
			    Cancel: function() {
			      $j( this ).dialog( "close" );
			    }
			  }
			});
		});
	});

	function del(account)
	{
		var	 api_url = '<?php echo $del_url."?account="?>' + account;

		console.log(api_url);
	   
		$j.ajax({
			url: api_url,
			type: 'POST',
			async: true,
			crossDomain: false,
			cache: false,
			success: function(data, textStatus, jqXHR){
				var data_json=jQuery.parseJSON(data);
				console.log(data_json);
				$j( "#dialog-confirm" ).dialog( "close" );
				if(data_json.status == 1)
				{
					$j("#notification span").text('刪除成功');
					$j("#notify").fadeIn(100).fadeOut(1000);
					setTimeout("update_page()", 500);
				}

			},
		});
	}
	function dialog_chk(account)
	{
		$j( "#dialog-confirm p" ).text('您確定要刪除嗎？');
		$j( "#dialog-confirm" ).dialog({
		  resizable: false,
		  height:150,
		  modal: true,
		  buttons: {
		    "Delete": function() {
				del(account);
		    },
		    Cancel: function() {
		      $j( this ).dialog( "close" );
		    }
		  }
		});
	}
	function update_page()
	{
		location.reload();
	}
</script>