<?php //echo js($this->config->item('order_javascript'), 'order')?>
<?php echo css($this->config->item('com_css'), 'com')?>
<style>


</style>
<div id="main_content">
	<div class="row" style="margin:10px 10px">
	    <div class="span2 sheader"><h1>公司管理</h1></div>
	    <div class="span11 sheader">
	    </div>
	</div>

<div class="row" style="margin:10px 10px">
	<div class="span12">
		<ul class="breadcrumb">
		  <li><a href="#">公司管理</a></li>
		  <li class="active"><?php echo $view_name?></li>
		</ul>
	</div>
</div>
<div class="row">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading">
					編輯公司
				</header>
				<div class="panel-body">
					<div class="form-horizontal tasi-form">
						
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">公司名稱</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="company_name" value="<?php echo $row->company_name ?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">公司簡介</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="8" id="company_intro" name="company_intro">
									<?php echo htmlspecialchars_decode($row->company_intro) ?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">公司簡介圖片</label>
							<div class="col-md-4">
								<input type="file" class="form-control" name="company_intro_pic">
								<input type="hidden" value="<?php echo $row->company_intro_pic; ?>" name="exist_company_intro_pic" />	
								<?php if (isset($row->company_intro_pic) && !empty($row->company_intro_pic)): ?>
									<img src="<?php echo site_url()."assets/".$row->company_intro_pic; ?>" />
									<br>
									<input type="checkbox" name="company_intro_pic_delete" />刪除
								<?php endif ?> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-sm-2 control-label">公司LOGO</label>
							<div class="col-md-4">
								<input type="file" class="form-control" name="company_logo">
								<input type="hidden" value="<?php echo $row->company_logo; ?>" name="exist_company_logo" />	
								<?php if (isset($row->company_logo) && !empty($row->company_logo)): ?>
									<img src="<?php echo site_url()."assets/".$row->company_logo; ?>" />
									<br>
									<input type="checkbox" name="company_logo_delete" />刪除
								<?php endif ?> 
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
		$( 'textarea#company_intro' ).ckeditor(config); 

	});
</script>