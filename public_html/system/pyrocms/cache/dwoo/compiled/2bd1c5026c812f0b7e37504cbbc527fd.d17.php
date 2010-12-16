<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

 <!-- saved from url=(0014)about:internet -->

<!-- Begin head -->
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="author" content="iKreativ.com" />
<meta name="copyright" content="PyroCMS.com" />
<meta name="robots" content="noindex, nofollow" />
<meta name="distribution" content="global" />
<meta name="resource-type" content="document" />
<meta name="language" content="en" />

<link rel="shortcut icon" href="favicon.png" type="image/x-icon" />

<!-- Begin stylesheets -->
<link href="http://de.buyme.vn//system/pyrocms/themes/default/css/style.css" type="text/css" rel="stylesheet" />

<!-- End stylesheets -->


				<script type="text/javascript">
					var APPPATH_URI = "/system/pyrocms/";
					var BASE_URI = "/";
				</script>
		<link rel="canonical" href="http://de.buyme.vn/index.php/edit-settings" />
		<link rel="alternate" type="application/rss+xml" title="Un-named Website" href="http://de.buyme.vn/index.php/news/rss/all.rss" />

<!-- Place CSS bug fixes for IE 6 in this comment -->
<!--[if IE 6]>
<meta http-equiv="refresh" content="0; url=http://www.microsoft.com/windows/internet-explorer/default.aspx" />
<script type="text/javascript">
/* <![CDATA[ */
window.top.location = 'http://www.microsoft.com/windows/internet-explorer/default.aspx';
/* ]]> */
</script>
<![endif]-->

<!-- Place CSS bug fixes for IE 7 in this comment -->
<!--[if IE 7]>
<link href="http://de.buyme.vn//system/pyrocms/themes/default/css/ie.css" type="text/css" rel="stylesheet" />

<![endif]-->

<title>Un-named Website&nbsp;&bull;&nbsp;Edit | User Settings | Users</title>

</head>

<body id="top">

<!-- Begin pageWrapper -->
<div id="pageWrapper">

<!-- Begin header -->
<div id="header">
	
<!-- Begin logo -->
<div id="logo">
<h1><a href="http://de.buyme.vn/" title="Home">Un-named Website</a></h1>
<h2 class="slogan">Add your slogan here</h2>
</div>
<!-- End logo -->

<!-- Begin user meta -->
<div id="user-meta">
Welcome Dat Quoc, you are logged in. <br /> <a href="http://de.buyme.vn/index.php/users/logout">Log out</a> <span class="nav-splitter">&nbsp;&bull;&nbsp;</span> 

<a href="http://de.buyme.vn/index.php/edit-profile">Edit Profile</a> <span class="nav-splitter">&nbsp;&bull;&nbsp;</span> 

		
<a href="http://de.buyme.vn/index.php/edit-settings">Settings</a>
		
 <span class="nav-splitter">&nbsp;&bull;&nbsp;</span> <a href="http://de.buyme.vn/index.php/admin" target="_blank">Control Panel</a>
		

</div>
<!-- End user meta -->

</div>
<!-- End header -->

<!-- Begin nav -->
<ul id="head-nav">
<li><a href="http://de.buyme.vn/index.php" target="">Home</a></li>

</ul>
<!-- End nav -->

<!-- Begin contentWrapper -->
<div id="contentWrapper">

<!-- Begin content -->
<div id="content">
	
<p id="forum_breadcrumbs">
</p>

<?php if ((($tmp = (isset($this->scope["session"]) ? $this->scope["session"] : null)) ? $tmp->flashdata('notice') : null)) {
?>
<div class="notice-box"><?php echo $this->scope["session"]->flashdata('notice');?></div>
<?php 
}?>


<?php if ((($tmp = (isset($this->scope["session"]) ? $this->scope["session"] : null)) ? $tmp->flashdata('success') : null)) {
?>
<div class="success-box"><?php echo $this->scope["session"]->flashdata('success');?></div>
<?php 
}?>


<?php if ((($tmp = (isset($this->scope["session"]) ? $this->scope["session"] : null)) ? $tmp->flashdata('error') : null)) {
?>
<div class="error-box"><?php echo $this->scope["session"]->flashdata('error');?></div>
<?php 
}?>

		
<div class="post">
	<style type="text/css">
fieldset dl dd label {
	width:8em;
	display:inline-block;
}
fieldset dl dd input, fieldset dl dd textarea {
	width:95%;
}
</style>
    <h2></h2>
    
	<form action="http://de.buyme.vn/index.php/edit-settings" method="post" accept-charset="utf-8" id="user_edit_settings">	
	<fieldset><legend>Name</legend>
		
		<p class="float-left spacer-right">
			<label for="first_name">First Name</label><br/>
			<input type="text" name="settings_first_name" value="Dat"  />		</p>
		
		<p>
			<label for="last_name">Last Name</label><br/>
			<input type="text" name="settings_last_name" value="Quoc"  />		</p>
		
		<!-- Removed since email is the identity
		<p class="float-left spacer-right">
			<label for="email">E-mail</label><br/>
			<input type="text" name="settings_email" value="nqdat@vdc.com.vn"  />		</p>
		
		<p>
			<label for="confirm_email">Confirm E-mail</label><br/>
			<input type="text" name="settings_confirm_email" value=""  />		</p>
		-->
		
	</fieldset>
	
	<fieldset><legend>Change password</legend>
		
		<p class="float-left spacer-right">
			<label for="password">Password</label><br/>
			<input type="password" name="settings_password" value=""  />		</p>
		
		<p>
			<label for="confirm_password">Confirm Password</label><br/>
			<input type="password" name="settings_confirm_password" value=""  />		</p>

	</fieldset>
	
	<fieldset><legend>Other settings</legend>
		
		<p>
			<label for="settings_lang">Language</label><br/>
			<select name="settings_lang">
<option value="en" selected="selected">English</option>
<option value="es">Espa&ntilde;ol</option>
<option value="fr">Français</option>
<option value="de">Deutsch</option>
<option value="pl">Polski</option>
<option value="nl">Nederlands</option>
<option value="br">Portugu&ecirc;s do Brasil</option>
<option value="zh">繁體中文</option>
</select>		</p>
		
	</fieldset>
	
	<input type="submit" name="" value="Save settings"  />	
 </form>
	<br style="clear:both;" />
</div>
	
</div>
<!-- End content -->

<div id="sidebar">

	<div id="navigation">
		<h2>Navigation</h2>

		<ul>
		
		</ul>

	</div>

	

</div>

</div>
<!-- End contentWrapper -->

<!-- Begin footer -->
<div id="footerWrapper">
	<div id="footer">

	<div id="poweredby"><a href="http://pyrocms.com/"><img src="/system/pyrocms//themes/default/img/logo.png" alt="Poweredby PyroCMS"> Powered by PyroCMS</div>

	<ul id="foot-nav">
		
		<li><a class="last" href="#top" title="Back to Top">Top &uarr;</a></li><br />
		&copy;2010 Un-named Website. All Rights Reserved.
	</ul>

	</div>
</div>
<!-- End footer -->

</div>
<!-- End pageWrapper -->

<!-- Begin scripts -->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load('jquery', '1.4.2');</script>
<script type="text/javascript" src="/system/pyrocms//themes/default/js/localscroll.js"></script>
<script type="text/javascript" src="/system/pyrocms//themes/default/js/scrollto.js"></script>
<script type="text/javascript" src="/system/pyrocms//themes/default/js/easing.js"></script>
<script type="text/javascript" src="/system/pyrocms//themes/default/js/cufon.js"></script>
<script type="text/javascript" src="/system/pyrocms//themes/default/js/qk.font.js"></script>
<script type="text/javascript" src="/system/pyrocms//themes/default/js/global.js"></script>
<!-- End scripts -->

<script type="text/javascript">Cufon.now();</script>

</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>