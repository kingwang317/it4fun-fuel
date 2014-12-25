<?php //echo js($this->config->item('order_javascript'), 'order')?>
<?php echo css($this->config->item('com_css'), 'com')?>
<style>


</style>
<div id="main_content">
	<div class="row" style="margin:10px 10px">
	    <div class="span2 sheader"><h1>應徵列表</h1></div>
	    <div class="span11 sheader">
	    </div>
	</div>

<div class="row" style="margin:10px 10px">
	<div class="span12">
		<ul class="breadcrumb">
		  <li><a href="#">應徵列表</a></li>
		  <li class="active"><?php echo $view_name?></li>
		</ul>
	</div>
</div>
<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					<?php echo $view_name?>
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">
						
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">會員帳號</label>
							<div class="col-sm-10">
							 	<label><?php echo $row->account ?></label>
							 	<input type="hidden" name="id" value="<?php echo $row->id ?>" />
							 	<input type="hidden" name="job_id" value="<?php echo $row->job_id ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">姓名</label>
							<div class="col-sm-10">
							 	<label><?php echo $row->name ?></label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">投遞時間</label>
							<div class="col-md-4"> 
							 	<label><?php echo date_formatter($row->drop_date,'Y-m-d') ?></label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">處理狀態</label>
							<div class="col-md-4">
								<div class="radio">
								  <label>
								    <input type="radio" name="process_type" id="job_status0" value="0" <?php echo $row->process_type == "0" ?"checked":""  ?>>
								    未處理
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="process_type" id="job_status1" value="1" <?php echo $row->process_type == "1" ?"checked":""  ?>>
								    待確認時間
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="process_type" id="job_status1" value="1" <?php echo $row->process_type == "2" ?"checked":""  ?>>
								    已通知面試
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="process_type" id="job_status1" value="1" <?php echo $row->process_type == "3" ?"checked":""  ?>>
								    完成面試
								  </label>
								</div>
							</div>
						</div> 
						<div class="form-group"> 
							<label class="col-sm-2 col-sm-2 control-label">處理備註</label>
							<div class="col-md-4">
							 	<textarea class="form-control" rows="8" id="note" name="note">
									<?php echo htmlspecialchars_decode($row->note) ?>
								</textarea>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">面試時間</label>
							<div class="col-sm-10">
								<input type="text" class="form-control interview_time" name="interview_time" value="<?php echo $row->interview_time ?>" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">面試地點</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="interview_place" value="<?php echo $row->interview_place ?>" >
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-info" >更新</button>
								<button type="button" class="btn btn-danger" onClick="aHover('<?php echo $back_url?>')">返回</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>


<?php echo js($this->config->item('com_javascript'), 'com')?>
<?php echo js($this->config->item('com_ck_javascript'), 'com')?>

<script>
	function aHover(url)
	{
		location.href = url;
	}

	jQuery(document).ready(function($) {
		
		// $('.interview_time').datepicker({dateFormat: 'yy-mm-dd'});
		$('.interview_time').datetimepicker();
		var config =
            {
                height: 380,
                width: 850,
                linkShowAdvancedTab: false,
                scayt_autoStartup: false,
                enterMode: Number(2),
                toolbar_Full: [
                				[ 'Styles', 'Format', 'Font', 'FontSize', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
                				['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList'],
                                ['Link', 'Unlink'], ['Undo', 'Redo', '-', 'SelectAll'], [ 'TextColor', 'BGColor' ],['Checkbox', 'Radio', 'Image' ], ['Source']
                              ]

            };
		$( 'textarea#note' ).ckeditor(config); 

	});
</script>