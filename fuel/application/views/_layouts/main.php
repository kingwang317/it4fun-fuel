<?php //$this->load->view('_blocks/header')?>


	<?php 
		if(isset($views)){
			$this->load->view($views);
		}
		else
		{
			define('FUELIFY', FALSE);
			echo fuel_var('body', '');
		}
	?>
	
<?php //$this->load->view('_blocks/footer')?>
