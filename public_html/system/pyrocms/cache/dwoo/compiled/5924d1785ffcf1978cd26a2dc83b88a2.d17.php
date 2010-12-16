<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><h2 id="page_title">Login</h2>

<div class="error_box">
	<p><p>In-Correct Login</p></p>
</div>

<form action="http://de.buyme.vn/index.php/users/login" method="post" accept-charset="utf-8" id="login"><ul>
	<li>
		<label for="email">E-mail</label>
		<input type="text" id="email" name="email" maxlength="120" />
	</li>
	<li>
		<label for="password">Password</label>
		<input type="password" id="password" name="password" maxlength="20" />
	</li>
	<li id="remember_me">
		<input type="checkbox" name="remember" value="1"  />Remember Me	</li>
	<li class="form_buttons">
		<input type="submit" value="Login" name="btnLogin" /> or <a href="http://de.buyme.vn/index.php/register">Register</a>	</li>
	<li>
		<a href="http://de.buyme.vn/index.php/users/reset_pass">Forgot your password?</a> | <a href="http://de.buyme.vn/index.php/register">Register</a>	</li>
</ul>
</form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>