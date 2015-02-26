<?php echo css($this->config->item('com_css'), 'com')?>

<section class="main-content">
<section class="wrapper">
	<div id="dialog-confirm" title="刪除確認?">
	  <p></p>
	</div>
	<div class="row" style="">
	    <div class="col-md-12"><h3> <?php echo $com_name ?> 職缺管理 </h3> </div>
	     
	</div>

	<div class="row state-overview top-buffer">
	
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol blue">
					<i class="icon-user"></i>
				</div>
				<div class="value">
					<h1 class="count2" value="<?php echo $total_count ?>"><?php echo $total_count ?></h1>
					<p>職缺數</p>
				</div>
			</section>
		</div> 
	    <div class="span6"> 
	    	<label>職務名稱</label>
	    	<input type="text" class="input-sm" placeholder="請輸入關鍵字" name="search_title" value="<?php echo $search_title; ?>"/>
	<button type="submit" class="btn btn-info btn-sm">搜尋</button> 
	    	<button class="btn btn-sm btn-info" type="button" onclick="aHover('<?php echo $create_url?>')">新增職缺</button>
	    	<button class="btn btn-sm btn-primary" type="button" onclick="aHover('<?php echo $com_url?>')">返回公司列表</button>
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
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" id="select-all"/>
							</label>
						</th> 
						<th>ID</th> 
						<th>最新投遞</th>
						<th>總投遞數</th>
						<th>職務名稱</th>
						<th>工作簡介</th>
						<th>工作上架/下架</th>
						<th>職缺開放時間-起</th>
						<th>職缺開放時間-迄</th> 
						<th>應徵列表</th>
						<th>刪除</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($job_results))
					{
						foreach($job_results as $key=>$rows)
						{

					?>
					<tr>
						<td>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" name="com_id[]" com_id="<?php echo $rows->id?>"/>
							</label>
						</td> 
						<td><?php echo $rows->id ?></td>  
						<td><?php echo $rows->lastest_date ?></td>
						<td><?php echo $rows->total_count ?></td>
						<td><a href="<?php echo $edit_url.$rows->id?>"><?php echo $rows->job_title?></a></td>
						<td><?php echo substr(htmlspecialchars_decode($rows->job_intro),0,100)?></td>
						<td><?php echo job_status_string($rows->job_status) ?></td> 
						<td><?php echo date_formatter($rows->job_start_date,'Y-m-d') ?></td> 
						<td><?php echo date_formatter($rows->job_end_date,'Y-m-d') ?></td> 
					 	<td>
							<button class="btn btn-xs btn-info" type="button" onclick="aHover('<?php echo $deliver_url.$rows->id."/0" ?>')">應徵列表</button>
						</td>
						<td>
							<button class="btn btn-xs btn-danger del" type="button" onclick="dialog_chk(<?php echo $rows->id?>)">刪除</button>
						</td>
					</tr>
					<?php
						}
					}
					else
					{
					?>
						<tr>
							<td colspan="11">No results.</td>
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
<?php echo js($this->config->item('com_javascript'), 'com')?>
<script>
 
	var $j = jQuery.noConflict(true);
 

	function aHover(url)
	{
		location.href = url;
	}

	$("document").ready(function($) {
		// countUp($("h1.count").attr("value"));
		// countUp2($("h1.count2").attr("value"));
		// countUp3($("h1.count3").attr("value"));
		$j("#select-all").click(function() {

		   if($j("#select-all").prop("checked"))
		   {
				$j("input[name='com_id[]']").each(function() {
					$j(this).prop("checked", true);
				});
		   }
		   else
		   {
				$j("input[name='com_id[]']").each(function() {
					$j(this).prop("checked", false);
				});     
		   }
		});

		$j("button.delall").click(function(){
			var com_ids = [];
			var j = 0;
			var postData = {};
			var api_url = '<?php echo $multi_del_url?>';
			$j("input[name='com_id[]']").each(function(i){
				if($j(this).prop("checked"))
				{
					com_ids[j] = $j(this).attr('com_id');
					j++;
				}
			});

			postData = {'com_ids': com_ids};
			$( "#dialog-confirm p" ).text('您確定要刪除嗎？');
			$( "#dialog-confirm" ).dialog({
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
							$( "#dialog-confirm" ).dialog( "close" );
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
			      $( this ).dialog( "close" );
			    }
			  }
			});
		});
	});

	function del_com(com_id)
	{
		var	 api_url = '<?php echo $del_url?>' + com_id;
	   
		$.ajax({
			url: api_url,
			type: 'POST',
			async: true,
			crossDomain: false,
			cache: false,
			success: function(data, textStatus, jqXHR){
				var data_json=jQuery.parseJSON(data);
				console.log(data_json);
				$( "#dialog-confirm" ).dialog( "close" );
				if(data_json.status == 1)
				{
					$j("#notification span").text('刪除成功');
					$j("#notify").fadeIn(100).fadeOut(1000);
					setTimeout("update_page()", 500);
				}

			},
		});
	}
	function dialog_chk(com_id)
	{
		$( "#dialog-confirm p" ).text('您確定要刪除嗎？');
		$( "#dialog-confirm" ).dialog({
		  resizable: false,
		  height:150,
		  modal: true,
		  buttons: {
		    "Delete": function() {
				del_com(com_id);
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