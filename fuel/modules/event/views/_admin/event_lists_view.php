<?php echo css($this->config->item('event_css'), 'event')?>
<style>
	.DateStart{color: #0c1ccc;}
	.DateEnd{color: #ff0000;}
	h1{margin-top: 6px;}
</style>

<section class="main-content">
<section class="wrapper" style="margin:0px">
	<div id="dialog-confirm" title="刪除確認?">
	  <p></p>
	</div>

	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：活動列表</li>
			</ul>
		</div>
	</div>

	<div class="row" style="">
 		
	    <div class="col-md-12 sheader"> 
			 
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
					<button type="submit" class="btn btn-warning">搜尋</button>
					<button class="btn btn-info" type="button" onClick="aHover('<?php echo $creat_url;?>')">新增活動</button>
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
		 
			</header>
			<div class="alert alert-success" role="alert">
				<strong>共 筆</strong>
			</div>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" id="select-all"/>
							</label>
						</th>
						<th>活動主題</th>
						<th>活動時間</th>
						<th>報名時間</th>
						<th>活動地點</th>
						<th>活動費用</th>
						<th>刪除</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" name="account[]" eventid=""/>
							</label>
						</td>
						<td><a href="#">通往職場的早鳥"獵"車：藥廠以及醫材業</a></td>
						<td>
							S:&nbsp;<span class="DateStart">2014-12-31 12:30</span><br />
							E:&nbsp;<span class="DateEnd">2014-12-31 18:30</span>
						</td>
						<td>
							S:&nbsp;<span class="DateStart">2014-10-31 12:30</span><br />
							E:&nbsp;<span class="DateEnd">2014-11-31 18:30</span>
						</td>
						<td>
							台北101大樓
						</td>
						<td>
							100
						</td>
						<td>
							<button class="btn btn-xs btn-danger del" type="button" onclick="dialog_chk('')">刪除</button>
						</td>
					</tr>
				</tobdy>
			</table>
		</section>
	</div>
	<div style="text-align:center">
	  <ul class="pagination">
		<?php //echo $page_jump?>
	  </ul>
	</div>
</section>
</section>
<?php echo js($this->config->item('event_javascript'), 'event')?>
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}
	function aHoverBlank(url)
	{
		window.open(url);
	}

	$j("document").ready(function($) {

		//$('#create_time_e').datepicker({dateFormat: 'yy-mm-dd'});
		//$('#create_time_s').datepicker({dateFormat: 'yy-mm-dd'});

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
			var api_url = '';
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
		var	 api_url = '' + account;

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