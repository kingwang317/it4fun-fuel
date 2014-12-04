<?php echo css($this->config->item('com_css'), 'com')?>

<section class="main-content">
<section class="wrapper">
	 
	<div class="row" style="">
	    <div class="col-md-12"><h3> <?php echo $com_name.' - '.$job_title.' 應徵列表' ?>  </h3> </div>
	     
	</div>

	<div class="row state-overview top-buffer">
	
		<div class="col-lg-3 col-sm-6">
			<section class="panel">
				<div class="symbol blue">
					<i class="icon-user"></i>
				</div>
				<div class="value">
					<h1 class="count2" value="<?php echo $total_count ?>"><?php echo $total_count ?></h1>
					<p>投遞數</p>
				</div>
			</section>
		</div> 
	    <div class="span6">  
	    	<button class="btn btn-sm btn-primary" type="button" onclick="aHover('<?php echo $job_url?>')">返回職缺列表</button>
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
						<th>會員帳號</th> 
						<th>姓名</th>
						<th>投遞時間</th>
						<th>處理狀態</th>
						<th>處理備註</th> 
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($deliver_results))
					{
						foreach($deliver_results as $key=>$rows)
						{

					?>
					<tr> 
						<td><a href="<?php echo $member_url.$rows->account?>"><?php echo $rows->account?></a></td>
						<td><?php echo $rows->name ?></td>
						<td><?php echo date_formatter($rows->drop_date,'Y-m-d') ?></td> 
						<td><?php echo process_type_string($rows->process_type) ?></td> 
						<td><?php echo substr(htmlspecialchars_decode($rows->note),0,100) ?></td>   
						<td> 
							<button class="btn btn-xs btn-info del" type="button" onclick="aHover('<?php echo $edit_url.$rows->id?>')">編輯</button>
						</td>
					</tr>
					<?php
						}
					}
					else
					{
					?>
						<tr>
							<td colspan="6">No results.</td>
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
		 
		  
	}); 
</script>