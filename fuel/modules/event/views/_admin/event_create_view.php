<?php echo css($this->config->item('event_css'), 'event')?> 

<section class="wrapper" style="margin:0px">
	<div class="row" style="margin:10px 10px">
	    <div class="col-md-2 sheader"><h4>新增履歷</h4></div>
	    <div class="col-md-10 sheader"></div>
	</div>

	<div class="row" style="margin:10px 10px">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：<a href="<?php echo $module_uri?>">活動列表</a></li>
			  <li class="active"><?php echo $view_name?></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					新增活動
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">活動主題</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="event_title" value=""> 
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">活動開始日期</label>
							<div class="col-sm-4">
								<div class="input-group date event_start_date">
								  <input type="text" class="form-control" readonly="" size="16" name="event_start_date">
								    <span class="input-group-btn">
								    <button type="button" class="btn btn-info date-set" style="height:34px;"><i class="icon-calendar"></i></button>
								    </span>
								</div>
							</div>
						</div>	 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">活動結束日期</label>
							<div class="col-sm-4">
								<div class="input-group date event_end_date">
								  <input type="text" class="form-control" readonly="" size="16" name="event_end_date">
								    <span class="input-group-btn">
								    <button type="button" class="btn btn-danger date-set" style="height:34px;"><i class="icon-calendar"></i></button>
								    </span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">報名開始日期</label>
							<div class="col-sm-4">
								<div class="input-group date regi_start_date">
								  <input type="text" class="form-control" readonly="" size="16" name="regi_start_date">
								    <span class="input-group-btn">
								    <button type="button" class="btn btn-info date-set" style="height:34px;"><i class="icon-calendar"></i></button>
								    </span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">報名結束日期</label>
							<div class="col-sm-4">
								<div class="input-group date regi_end_date">
								  <input type="text" class="form-control" readonly="" size="16" name="regi_end_date">
								    <span class="input-group-btn">
								    <button type="button" class="btn btn-danger date-set" style="height:34px;"><i class="icon-calendar"></i></button>
								    </span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">活動地點</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="event_place" value=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">活動簡介</label>
							<div class="col-sm-4">
								 <textarea class="form-control" rows="3" name="event_detail" id="EventDetail"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-info">新增</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $module_uri?>')">取消</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

</section>

<?php echo js($this->config->item('event_javascript'), 'event')?>
 
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}

	$j(document).ready(function($) {
		CKEDITOR.replace( 'EventDetail', {
			height: 380,
			width: 750,
			uiColor: '#5bc0de',
			toolbar: [
				[ 'Styles', 'Format', 'Font', 'FontSize'],['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
				['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList'],
				['Link', 'Unlink'], ['Undo', 'Redo'], [ 'TextColor', 'BGColor' ],['Checkbox', 'Radio', 'Image', 'flash' ], ['Source']
				]
		});

		$j(".event_start_date").datetimepicker({
		    format: "yyyy-m-d hh:ii",
		    autoclose: true
		}).on('changeDate', function(ev){
			console.log(ev);
		});

		$j(".event_end_date").datetimepicker({
		    format: "yyyy-m-d hh:ii",
		    autoclose: true
		});

		$j(".regi_start_date").datetimepicker({
		    format: "yyyy-m-d hh:ii",
		    autoclose: true
		    
		});

		$(".regi_end_date").datetimepicker({
		    format: "yyyy-m-d hh:ii",
		    autoclose: true
		});
		 

	});
</script>