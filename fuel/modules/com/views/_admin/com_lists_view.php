<?php echo css($this->config->item('com_css'), 'com')?>

<section class="main-content">
<section class="wrapper">
	<div id="dialog-confirm" title="刪除確認?">
	  <p></p>
	</div>
	<div class="row" style="">
	    <div class="col-md-2"><h3>公司管理</h3></div>
	    <div class="col-md-10 sheader">
			<div class="form-inline">
				<div class="form-group">
					<select class="form-control input-sm" name="act">
						<option value="by_name" <?php if($act == "by_name") echo "selected" ?>>依名稱</option> 
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control input-sm" placeholder="Search..." name="search_item" value="<?php echo $search_item; ?>"/>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-sm">Search</button>
					
				</div>
			</div>
	    </div>
	</div>

	<div class="row state-overview">
	
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol blue">
					<i class="icon-user"></i>
				</div>
				<div class="value">
					<h1 class="count2" value="<?php echo $total_count ?>"><?php echo $total_count ?></h1>
					<p>所有公司數</p>
				</div>
			</section>
		</div>
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol blue">
					<i class="icon-user"></i>
				</div>
				<div class="value">
					<h1 class="count3" value="<?php echo $search_count ?>"><?php echo $search_count ?></h1>
					<p>搜尋結果數</p>
				</div>
			</section>
		</div>
		
	    <div class="span3"> 
	    	<button class="btn btn-sm btn-info" type="button" onclick="aHover('<?php echo $create_url?>')">新增公司</button>
	    </div>
	    <div class="span10"></div>
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
						<th></th>
						<th>ID</th>
						<th>公司名稱</th>
						<th>公司簡介</th>
						<th>職缺</th>
						<th>刪除</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($com_results))
					{
						foreach($com_results as $key=>$rows)
						{

					?>
					<tr>
						<td>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" name="com_id[]" com_id="<?php echo $rows->id?>"/>
							</label>
						</td>
						<td>
							<?php if (isset($rows->company_logo) && !empty($rows->company_logo)): ?>
								<img style="max-width:200px" src="<?php echo site_url()."assets/".$rows->company_logo; ?>" /> 
							<?php endif ?> 
						</td>
						<td><?php echo $rows->id ?></td>
						<td><a href="<?php echo $edit_url.$rows->id?>"><?php echo $rows->company_name?></a></td>
						<td><?php echo substr(htmlspecialchars_decode($rows->company_intro),0,100)?></td>
						<td>
							<button class="btn btn-xs btn-info" type="button" onclick="aHover('<?php echo $job_url.$rows->id."/0" ?>')">職缺</button>
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
							<td colspan="7">No results.</td>
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
		$("#select-all").click(function() {

		   if($("#select-all").prop("checked"))
		   {
				$("input[name='com_id[]']").each(function() {
					$(this).prop("checked", true);
				});
		   }
		   else
		   {
				$("input[name='com_id[]']").each(function() {
					$(this).prop("checked", false);
				});     
		   }
		});

		$("button.delall").click(function(){
			var com_ids = [];
			var j = 0;
			var postData = {};
			var api_url = '<?php echo $multi_del_url?>';
			$("input[name='com_id[]']").each(function(i){
				if($j(this).prop("checked"))
				{
					com_ids[j] = $(this).attr('com_id');
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
					$.ajax({
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
								$(".notify").find("span").text('刪除成功');
								$(".notify").fadeIn(100).fadeOut(1000);
								setTimeout("update_page()", 500);
							}
							else
							{
								$(".notify").find(".alert").addClass('alert-error');
								$(".notify").find(".alert").addClass('alert-block');
								$(".notify").find("span").text('刪除失敗');
								$(".notify").slideDown(500).delay(1000).fadeOut(200);
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
					$("#notification span").text('刪除成功');
					$("#notify").fadeIn(100).fadeOut(1000);
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
		      $( this ).dialog( "close" );
		    }
		  }
		});
	}
	function update_page()
	{
		location.reload();
	}
</script>