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
		<link rel="canonical" href="http://de.buyme.vn/index.php/edit-profile" />
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

<title>Un-named Website&nbsp;&bull;&nbsp;Edit | Profile | Users</title>

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
	<div id="user_edit_profile">
	<h2 id="page_title">Edit your profile</h2>

	   
	<form action="http://de.buyme.vn/index.php/edit-profile" method="post" accept-charset="utf-8" id="user_edit_profile">
	<fieldset id="user_personal">
		<legend>Personal</legend>
		<p>
			<label for="display_name">Display Name</label>
			<input type="text" name="display_name" value="Dat Dat"  />		</p>
			
		<p>
			Date of Birth			Day: <select name="dob_day">
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>			Month: <select name="dob_month">
<option value="1" selected="selected">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>			Year: <select name="dob_year">
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970" selected="selected">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
<option value="1899">1899</option>
<option value="1898">1898</option>
<option value="1897">1897</option>
<option value="1896">1896</option>
<option value="1895">1895</option>
<option value="1894">1894</option>
<option value="1893">1893</option>
<option value="1892">1892</option>
<option value="1891">1891</option>
<option value="1890">1890</option>
</select>		
		</p>
	
		<p>
			<label for="gender">Gender</label>
			<select name="gender">
<option value="" selected="selected">Not telling</option>
<option value="m">Male</option>
<option value="f">Female</option>
</select>		</p>
		
		<p>
			<label for="bio">About me</label>
			<textarea name="bio" cols="60" rows="8" value="" ></textarea>		
		</p>
	</fieldset>

	<fieldset id="user_contact">
		<legend>Contact</legend>
		<p>
			<label for="phone">Phone</label>
			<input type="text" name="phone" value=""  />		</p>	
		<p>
			<label for="mobile">Mobile</label>
			<input type="text" name="mobile" value=""  />		</p>
		<p>
			<label for="address_line1">Line #1</label> 
			<input type="text" name="address_line1" value=""  />		</p>
		<p>
			<label for="address_line2">Line #2</label> 
			<input type="text" name="address_line2" value=""  />		</p>
		<p>	
			<label for="address_line3">Line #3</label> 
			<input type="text" name="address_line3" value=""  />		</p>
		<p>	
			<label for="postcode">Post/Zip Code</label>
			<input type="text" name="postcode" value=""  />		<p>
		<p>
			<label for="website">Website</label>
			<input type="text" name="website" value=""  />		</p>
	</fieldset>

	<fieldset id="user_social">
		<legend>Instant messengers</legend>
		<p>
			<label for="msn_handle">MSN</label>
			<input type="text" name="msn_handle" value=""  />		</p>
		<p>	
			<label for="aim_handle">AIM</label>
			<input type="text" name="aim_handle" value=""  />		</p>
		<p>
			<label for="yim_handle">Yahoo! messenger</label>
			<input type="text" name="yim_handle" value=""  />		</p>
		<p>	
			<label for="gtalk_handle">GTalk</label>
			<input type="text" name="gtalk_handle" value=""  />		</p>
	</fieldset>

	<fieldset><legend>Social</legend>
		<dl>
			<dt><label for="mobile">Gravatar</label></dt>
			<dd><input type="text" name="gravatar" value=""  /></dd>
		</dl>

		<!--
		<dl>
			<dt><label for="twitter">Twitter</label></dt>
			<dd>
				<a href="http://de.buyme.vn/index.php/users/profile/twitter">Connect with Twitter</a>			</dd>
		</dl>
		-->

	</fieldset>

	<input type="submit" name="" value="Save profile"  />
	</form></div>
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