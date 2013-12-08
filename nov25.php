
<?php
  require_once('login.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>>_<</title>
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <link rel="shortcut icon" href="img/favicon.png" type="image/png">


<script type="text/javascript">

</script>

<script src="js/ajax.js" language="javascript"></script>
<script src="js/ajaxonline.js" language="javascript"></script>
<script src="js/script.js" language="javascript"></script>

<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700,400' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/style.css" />

</head>
<body onclick="insertonlineuser()" onload="document.form.user.focus();" >
    
<div id="wrap" onclick="cleartitle()" >
    <?php  if (!isset($_SESSION['username'])) {
  //require_once('appvars.php');
 
  $signup_error_msg = '';
  require_once('connectvar.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM chat_user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO chat_user (username, password, join_date) VALUES ('$username', '$password1', NOW())";
        mysqli_query($dbc, $query);
        
            $query = "SELECT * FROM chat_user WHERE username = '$username' AND password = '$password1'";
            $data = mysqli_query($dbc, $query);
            
            if (mysqli_num_rows($data) == 1) {
          session_start();
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (3600 * 1000 * 24 * 365 * 10));    // expires in 90 days
          setcookie('username', $row['username'], time() + (3600 * 1000 * 24 * 365 * 10));  // expires in 90 days
          //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          $home_url = 'http://g.rambam770.com/chat/editprofile.php';
          header('Location: ' . $home_url);
          exit;

        }
        else {
             $signup_error_msg =  'less then one';
        }
        
        // Confirm success with the user
        $signup_error_msg = '<div class="error" id="error_login" >Your new account has been successfully created.</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        mysqli_close($dbc);
        //exit(); ???
      }
      else {
        // An account already exists for this username, so display an error message
         $signup_error_msg = '<div class="error" id="error_login" >An account already exists for this username. Please use a different address.</div>';
        $username = "";
      }
    }
    else {
       $signup_error_msg = '<div class="error" onclick="scrollRight();" id="error_login" >You must enter all of the sign-up data, including the desired password twice.</div>';
	   ?>
	   <script>$(document).ready(function() {$("#signIn_window").scrollLeft('600');});</script>
	   <?php
    }
  }

  mysqli_close($dbc);
?>

  <?php  if (!isset($_SESSION['username'])) { ?>
	<div id="signIn_window" class="signIn_window">
	<div id="logIn_signUp">
  
  <div id="log_in" class="logIn_signUp_class">
  
  <form id="loginform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  		<h2>G&ampG Chat- Log In</h2>
			<label class="label_txt"  for="username">Username:</label>
			<input onclick="clear_error()" class="input_txt clear_login" type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
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
  
  <?php  }} ?>
    
   
 <?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
    //echo '<p class="error">' . $login_error_msg . '</p>';
?><div id="sign_up" class="logIn_signUp_class">
	<form id="signupform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <h2>G&ampG Chat- Sign up</h2>
     <!-- <p>Please enter your username and desired password to sign up to chatting is for losers.</p>--
		<label class="label_txt"  for="username">Username:</label>
		<input class="input_txt" type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
		<label class="label_txt"  for="password1">Password:</label>
		<input class="input_txt" type="password" id="password1" name="password1" /><br />
		<label class="label_txt"  for="password2">Password (retype):</label>
		<input class="input_txt" type="password" id="password2" name="password2" /><br /><br />
		<button class="btn bg_btn rounded" type="submit" value="Sign Up" name="submit" >Sign Up</button>
	-->
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
	</div>
	</div>
	

<?php
  }
  else {
    // Confirm the successful log-in
    //echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>
 <?php  if (isset($_SESSION['username'])) {
     ?>
        <script type="text/javascript">

            m()
            document.body.click = insertonlineuser();
        </script>
  <?php
    
 //echo '<a id="logout" href="logout.php">Logout: (<span id="username">' . $_SESSION['username'] . '</span>)</a>';
 ?>
 
 
 <div id="profile_etc">
 <div id="first"><?php if (isset($_SESSION['user_id'])) {
 echo '<span id="profile_etc_username" class="username">' . $_SESSION['username'] . '</span>'; }?></div>
<div id="more" class="more"> <?php  if (isset($_SESSION['user_id'])) { 
 echo '<a class="profile_etc_submenue" href="logout.php">Logout</a>';}?>
 <br/>
 <a class="profile_etc_submenue" href="" />Profile (!)</a>
 <br />
 <a class="profile_etc_submenue" href="" />Edit Profile (!)</a>
 </div>
 
 </div>
 
 <div id="addmydiv">
    <div id="add" class="rounded">
        <form name="form" action="javascript:insert()" method="post" >
			<div id="enter_chat">
            <textarea type="text" maxlength="255" id="text" class="rounded" name="text"></textarea>
            
            <input id="chat"  class="rounded" name="chat" type="hidden" value="<?php echo $_SESSION['username']; ?>"/>
			<span id="">Limit: 255 Characters.</span>
			</div>
			<div id="enter">
            <span id="hit_enter_">Hit "ENTER"<br />to submit.</span>
            <input id="" class="rounded btn" type="submit" value="Enter" name="submit" onclick="clearit()" />
			</div>
		
        </form>   
 
    </div>
        <div id="insert_response"></div>
        <div id="mydiv"><p><em>Loading ...</em></p></div>
    </div>
	<div id=""><h2">Who's online...</h2>
		<div id="useronline"></div>	
	</div>
   <?php }    else {
         //echo'please sign in';
    }
    ?>
    


</div>
</body>
</html>