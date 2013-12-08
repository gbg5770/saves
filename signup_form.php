	<div id="signIn_window" class="signIn_window">
	<div id="logIn_signUp">
  
  <div id="log_in" class="logIn_signUp_class">
  
  <form id="loginform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  		<h2>G&ampG Chat- Log In</h2>
			<label class="label_txt"  for="username">Username:</label>
			<input onclick="clear_error()" class="input_txt clear_login" autofocus="autofocus" type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
			<label class="label_txt "  for="password">Password:</label>
			<input onclick="clear_error()" class="input_txt clear_login" type="password" name="password" /><br /><br />
			<button class="btn bg_btn rounded" type="submit" value="Log In" name="submitlogin" >Log In</button>
  </form>
  <div id="non_member_error"><?php echo $login_error_msg ?></div>
	<div id="notAMember_">
		<h4>Not a member? Sign up for free!</h4>
		<button class="btn bg_btn rounded toSignUp" type="button" value="Sign Up" name="" >Sign Up</button>
	</div>
  
  </div>
  