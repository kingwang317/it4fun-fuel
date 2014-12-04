<?php //echo js($this->config->item('order_javascript'), 'order')?>
<?php echo css($this->config->item('com_css'), 'com')?>
<style>


</style>
<div id="main_content">
	<div class="row" style="margin:10px 10px">
	    <div class="span2 sheader"><h1>公司職缺</h1></div>
	    <div class="span11 sheader">
	    </div>
	</div>

<div class="row" style="margin:10px 10px">
	<div class="span12">
		<ul class="breadcrumb">
		  <li><a href="<?php echo $back_url ?>"><?php echo $com_name ?></a></li>
		  <li class="active"><?php echo $view_name?></li>
		</ul>
	</div>
</div>
<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					公司職缺
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">						
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">職務名稱</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="job_title" >
								<input type="hidden" value="<?php echo $com_id ?>" name="company_id" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">工作簡介</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="8" id="job_intro" name="job_intro"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">工作說明</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="8" id="job_desc" name="job_desc"></textarea>
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">工作條件</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="8" id="job_term" name="job_term"></textarea>
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">工作地點</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="job_address" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">薪水-時薪</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="salary_hour" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">薪水-週薪</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="salary_week" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">薪水-月薪</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="salary_month" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">職缺開放時間-起</label>
							<div class="col-sm-10">
								<input type="text" class="form-control job_start_date" name="job_start_date" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">職缺開放時間-迄</label>
							<div class="col-sm-10">
								<input type="text" class="form-control job_end_date" name="job_end_date" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">狀態</label>
							<div class="col-sm-10"> 
								<div class="radio">
								  <label>
								    <input type="radio" name="job_status" id="job_status0" value="0" checked>
								    上架
								  </label>
								</div>
								<div class="radio">
								  <label>
								    <input type="radio" name="job_status" id="job_status1" value="1">
								    下架
								  </label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">需具備工作技能</label>
							<div class="col-sm-10">
									<ul class="list-group checked-list-box"> 
					                  <?php foreach ($skill as $key => $value): ?>
					                  	<li class="list-group-item">
					                  		<input type="checkbox" name="skill[]" value="<?php echo $value->code_id ?>" > 
					                  		<?php echo $value->code_name ?>
					                  	</li>
					                  <?php endforeach ?>
					                </ul>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">需具備語言</label>
							<div class="col-sm-10">
									<ul class="list-group checked-list-box"> 
					                  <?php foreach ($lang as $key => $value): ?>
					                  	<li class="list-group-item">
					                  		<input type="checkbox" name="lang[]" value="<?php echo $value->code_id ?>" > 
					                  		<?php echo $value->code_name ?>
					                  		<select name="level_<?php echo $value->code_id ?>">
											    <?php foreach ($level as $key => $value): ?>
											    	<option value="<?php echo $value->code_id ?>"><?php echo $value->code_name ?></option>
											    <?php endforeach ?>
											</select>
					                  	</li>
					                  <?php endforeach ?>
					                </ul>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12" style="text-align:center">
								<button type="submit" class="btn btn-info" >新增</button>
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

		// $('#job_end_date').datepicker({dateFormat: 'yy-mm-dd'}); 
		$('.job_start_date').datepicker({dateFormat: 'yy-mm-dd'});
		$('.job_end_date').datepicker({dateFormat: 'yy-mm-dd'});
		
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
		$( 'textarea#job_intro' ).ckeditor(config); 
		$( 'textarea#job_desc' ).ckeditor(config); 
		$( 'textarea#job_term' ).ckeditor(config); 

	});
</script>