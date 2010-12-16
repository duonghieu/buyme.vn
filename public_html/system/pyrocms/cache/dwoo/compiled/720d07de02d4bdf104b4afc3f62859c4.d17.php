<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!-- Begin logo -->
<div id="logo">
<h1><a href="http://de.buyme.vn:8080/" title="Home">Un-named Website</a></h1>
<h2 class="slogan">Add your slogan here</h2>
</div>
<!-- End logo -->

<!-- Begin user meta -->
<div id="user-meta">
<?php if ((($tmp = (isset($this->scope["session"]) ? $this->scope["session"] : null)) ? $tmp->userdata('user_id') : null)) {
?>
<?php echo sprintf(lang('logged_in_welcome'), ($this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'first_name',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["user"]) ? $this->scope["user"]:null), true)).(' ').($this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'last_name',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["user"]) ? $this->scope["user"]:null), true)));?> <br /> <a href="<?php echo site_url('users/logout');?>"><?php echo lang('logout_label');?></a> <span class="nav-splitter">&nbsp;&bull;&nbsp;</span> 

<?php if ((($tmp = (isset($this->scope["settings"]) ? $this->scope["settings"] : null)) ? $tmp->item('enable_profiles') : null)) {
?>
<?php echo anchor('edit-profile', lang('edit_profile_label'));?> <span class="nav-splitter">&nbsp;&bull;&nbsp;</span> 
<?php 
}?>

		
<?php echo anchor('edit-settings', lang('settings_label'));?>

		
<?php if ($this->readVarInto(array (  1 =>   array (    0 => '->',  ),  2 =>   array (    0 => 'group',  ),  3 =>   array (    0 => '',    1 => '',  ),), (isset($this->scope["user"]) ? $this->scope["user"]:null), true) == 'admin') {
?> <span class="nav-splitter">&nbsp;&bull;&nbsp;</span> <?php echo anchor('admin', lang('cp_title'), 'target="_blank"');

}?>

		
<?php 
}
else {
?>

<form action="<?php echo site_url('users/login');?>" method="post" accept-charset="utf-8" id="login-small">

<ul>
<li class="email">
<input type="text" id="email" name="email" maxlength="120" value="Email Address" onblur="if (this.value == '') { this.value = 'Email Address'; }"  onfocus="if (this.value == 'Email Address') { this.value = ''; }" />
</li>

<li class="pword">
<input type="password" id="password" name="password" maxlength="20" value="Enter Password" onblur="if (this.value == '') { this.value = 'Enter Password'; }"  onfocus="if (this.value == 'Enter Password') { this.value = ''; }" />
</li>

<li class="form-buttons">
<input type="submit" value="Login" name="btnLogin" /> or &nbsp;<a href="<?php echo site_url('register');?>">Signup</a> <input type="checkbox" id="remember-checksidebar" name="remember" value="1"  /><span>Remember Me</span>
</li>

</ul>
</form>

<?php 
}?>

</div>
<!-- End user meta -->
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>