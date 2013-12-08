<div id="sign_up" class="logIn_signUp_class">
	<form id="signupform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <h2>G&ampG Chat- Sign up</h2>
	<table id="sign_up_tbl">
<tr>
<td><label class="label_txt" for="username">Username:</label></td>
<td><input onclick="clear_error()" class="input_txt clear_login" type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br /></td>
</tr>
<tr>
<td><label class="label_txt"  for="password1">Password:</label></td>
<td><input onclick="clear_error()" class="input_txt clear_login" type="password" id="password1" name="password1" /><br /></td>
</tr>
<tr>
<td><label class="label_txt"  for="password2">Password (retype):</label></td>
<td><input onclick="clear_error()" class="input_txt clear_login" type="password" id="password2" name="password2" /><br /><br /><br /></td>
</tr>
</table>
<button class="btn bg_btn rounded" type="submit" value="Sign Up" name="submit" >Sign Up</button>
	
	
  </form>
   <div id="signup_error"><?php echo $signup_error_msg ?></div>
	<div id="back_to_logIn">
		<h4>Back to Login</h4>
		<button class="btn bg_btn rounded leftArrow" type="button" value="Back to Log in" name="" >Back to<br />Log In</button>
	</div>
	</div>