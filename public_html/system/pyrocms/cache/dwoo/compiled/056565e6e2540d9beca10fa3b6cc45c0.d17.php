<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div id="sidebar">

	<div id="navigation">
		<h2><?php echo lang('navigation_headline');?></h2>

		<ul>
		
		</ul>

	</div>

	

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>