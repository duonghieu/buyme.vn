<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!-- Begin footer -->
<div id="footerWrapper">
	<div id="footer">

	<div id="poweredby"><a href="http://pyrocms.com/"><img src="<?php echo $this->scope["pyro"]["application_uri"];?>/themes/default/img/logo.png" alt="Poweredby PyroCMS"> Powered by PyroCMS</div>

	<ul id="foot-nav">
		
		<li><a class="last" href="#top" title="Back to Top">Top &uarr;</a></li><br />
		&copy;<?php echo date('Y');?> <?php echo $this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'site_name',  ),  3 =>   array (    0 => '',    1 => '',  ),), $this->scope["settings"], false);?>. All Rights Reserved.
	</ul>

	</div>
</div>
<!-- End footer -->

</div>
<!-- End pageWrapper -->

<!-- Begin scripts -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load('jquery', '1.4.2');</script>
<script type="text/javascript" src="<?php echo $this->scope["pyro"]["application_uri"];?>/themes/default/js/localscroll.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["pyro"]["application_uri"];?>/themes/default/js/scrollto.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["pyro"]["application_uri"];?>/themes/default/js/easing.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["pyro"]["application_uri"];?>/themes/default/js/cufon.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["pyro"]["application_uri"];?>/themes/default/js/qk.font.js"></script>
<script type="text/javascript" src="<?php echo $this->scope["pyro"]["application_uri"];?>/themes/default/js/global.js"></script>
<!-- End scripts -->

<script type="text/javascript">Cufon.now();</script>

</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>