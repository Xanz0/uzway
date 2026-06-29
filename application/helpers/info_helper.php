<?php
	function alert($type, $message){
		if($message){
			echo '<div class="alert '.$type.'">
		            '.$message.'
		        </div>';
		}
		
	}

 ?>
