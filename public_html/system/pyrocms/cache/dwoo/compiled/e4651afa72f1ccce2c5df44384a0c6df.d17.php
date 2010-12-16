<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><style type="text/css">
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
 </form><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>