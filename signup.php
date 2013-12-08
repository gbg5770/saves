
<!DOCTYPE html>
<html>
<head>

	<title>My PHP</title>
	
<style type="text/css">

*
{
border: 0;
margin: 0;
}
img
{
border: 0px;
}


a{
	color: #014B4B;
	text-decoration:none;
}

a:hover{
	text-decoration: underline;
	color: #000000;
}

body{
	font: 12px Arial, Helvetica, sans-serif;
	color: #000000;
	background: #00FFFC url(images/bg.jpg) repeat-x top;
}

#bg{
	background:url(images/bg_img.jpg) center top no-repeat;
}

#maintop{
	background: white;
	width:801px;
	height: 9px;
	border-top-left-radius: 15px;
	border-top-right-radius: 15px;
}
#mainbot{
	background: url(images/bot.png) no-repeat;
	width:801px;
	height: 14px;
}

#main{
	width: 801px;
	margin: 0px auto;
}
#logo{
	text-align: right;
	padding-top: 30px;
	height: 76px;
}

#logo a {
	text-decoration: none;
	font-style: italic;
	font-size: 26px;
	color: #ffffff;
	font-weight: bold;
}


#logo H2 a{
	font-size: 10px;
}

#header{
	width: 800px;
	height: 173px;
	margin: 0px auto;
}


#buttons{
	width: 800px;
	height: 55px;
	background: url(images/menu.jpg) left top no-repeat;
	text-align:center;
}

#buttons ul {
    padding-left: 60px;
    margin: 0px;
}

#buttons li {
	display: inline;		
}

#buttons a {
	font-family: Tahoma, Arial, Helvetica, sans-serif;
	font-size: 18px;
	font-weight:normal;
	display: block;
	float: left;
	width: 130px;
	height: 40px;
	text-decoration: none;
	color: #014B4B;
	padding-top: 15px;
	margin-right: 5px;
	text-align: center;
}

#buttons a:hover {
	text-decoration: underline;
	background: url(images/but_bg.jpg) 0px 2px repeat-x;
}

#content{
	width: 801px;
	background: #FFFFFF;
}



#img_b {
	background:url(images/img.jpg) left top no-repeat;
	width: 559px;
	height: 216px;

}


#screen {
	width: 75px;
	height:75px;
	
	border-radius:15px;
	
}


#footer{
	background: url(images/grass-line.jpg) 0% 87%;
	height: 37px;
	width: 801px;
	font-size: 10px;
	color: #014B4B;
	padding-top: 4px;
	text-align: center;
	clear:both;
	margin: 15px auto;
	border-radius:15px;
}
#right ul 
{	
	list-style: none;
	width: 795px;
	height: 435px;	
	
	
}

</style>

</head>
<body>
<div id="bg">

<!-- header begins -->
<?php
echo $_SESSION['username'];
  // Insert the page footer
  require_once('nav.php');
?>
<!-- header ends -->

<div id="main">
<div id="maintop"><img src="images/spaser.gif" alt="" />
</div>

<div id="content">
<div id="right">
<ul>
<!-- content begins -->
  <h3>Mismatch - Sign Up</h3>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM mismatch_user WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO mismatch_user (username, password, join_date) VALUES ('$username', '$password1', NOW())";
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to log in and <a href="editprofile.php">edit your profile</a>.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <p>Please enter your username and desired password to sign up to Mismatch.</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>

      <legend>Registration Info</legend>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br />
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>

</ul>
</div>


</div>

<div id="mainbot">
<img src="images/spaser.gif" alt="" />
</div>
</div>

<!-- footer begins -->
<?php
  // Insert the page footer
  require_once('footer.php');
?>
</body>
</html>