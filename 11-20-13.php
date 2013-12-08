<?php
  require_once('connectvar.php');

  // Start the session
  session_start();

  // Clear the error message
  $login_error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submitlogin'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = "SELECT user_id, username FROM chat_user WHERE username = '$user_username' AND password = '$user_password'";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (3600 * 1000 * 24 * 365 * 10));    // expires in 90 days
          setcookie('username', $row['username'], time() + (3600 * 1000 * 24 * 365 * 10));  // expires in 90 days
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $login_error_msg = 'Sorry, you must enter a valid username and password to log in.';
    
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $login_error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>>_<</title>
   <script type="text/javascript" src="js/jquery.min.js"></script>
   
<script type="text/javascript">
//jquery
/*
    $(document).ready(function() {
        setInterval(function(){
            var user = $('.user').html();
            var chat = $('.chat').html();
            var f= '(1) ' + user + chat;
            var title = document.title;
            //var newt  = '';
           // alert(f);
            //alert(title);
            if (document.title !== f) {
                if (document.title !== newt) {
                    document.title = f;
                    var newt = f;
                }
            }

        }, 3000);
    });
*/
$(document).ready(function() {
    
$("#text").keydown(
  function() 
  {
    if(event.which == 13)
    {
      //event.preventDefault();
      insert();
      clearit();
      //$("#input1").css({background: 'yellow'})  // just to see it
    }
  }
);

// Scroll the log_in window to Sign_up window.


        $(".toSignUp").click(function() {



            $("#signIn_window").animate({scrollLeft:'600'}, 300);

        });

        $(".leftArrow").click(function() {




            $("#signIn_window").animate({scrollLeft:'-600'}, 300);
        });



});

</script>
<script src="ajax.js" language="javascript"></script>
<link rel="stylesheet" href="style.css" />
<script src="ajaxonline.js" language="javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700,400' rel='stylesheet' type='text/css'>

<script>

     
            function cleartitle() {
                document.title = '>_<';
            }
            function clear() {
                document.getElementById("text").value = '';
            }
            function clearit()
            {
            setTimeout(function(){document.getElementById("text").value = ''},0);
            }
            function m()
            {
                setInterval("loadXMLDoc()", 2000);
		setInterval("useronline()", 1000);
            }
            
            function loadXMLDoc()
            
            {
            var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                var mydiv = document.getElementById("mydiv").innerHTML;
                var resp = xmlhttp.responseText;


//alert(mydiv);
                if (resp !== mydiv) {
                    document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
                    
                    setTimeout(function(){
                        var user = $('.user').html();
                        var chat = $('.chat').html();
                        var f= '(1) ' + user + ': ' + chat;
                        var id = $('.username').html();
                            if (id !== user) {
                                document.title = f;
                            }
                    },100);
                }
              }
            }
            xmlhttp.open("post","http://g.rambam770.com/chat/chats.php?plus='+plus'",true);
            xmlhttp.send();
            }
            
            
	    function useronline()   {
            
            
            var xmlhttp;
            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            }
            else
            {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function()
            {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
              {
                var useronline = document.getElementById("useronline").innerHTML;
                var resp = xmlhttp.responseText;
                if (resp !== useronline) {
                    document.getElementById("useronline").innerHTML=xmlhttp.responseText;
                    
                }
              }
            }
            xmlhttp.open("post","http://g.rambam770.com/chat/onlinenow.php",true);
            xmlhttp.send();
            }
    </script>
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
      $query = "SELECT * FROM user_user WHERE username = '$username'";
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
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);

        }
        else {
             $signup_error_msg =  'less then one';
        }
        
        // Confirm success with the user
        $signup_error_msg = '<p>Your new account has been successfully created.</p>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        mysqli_close($dbc);
        //exit(); ???
      }
      else {
        // An account already exists for this username, so display an error message
         $signup_error_msg = '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
    }
    else {
       $signup_error_msg = '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
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
			<input class="input_txt" type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
			<label class="label_txt"  for="password">Password:</label>
			<input class="input_txt" type="password" name="password" /><br /><br />
			<button class="btn bg_btn rounded" type="submit" value="Log In" name="submitlogin" >Log In</button>
  </form>
  <div id="non_member_error"><?php echo '<p class="error">' . $login_error_msg . '</p>'; ?></div>
	<div id="notAMember_">
		<h4>Not a member? Sign up for free!</h4>
		<button class="btn bg_btn rounded toSignUp" type="button" value="Sign Up" name="" >Sign Up >></button>
	</div>
  
  </div>
  
  <?php  }} ?>
    
   
 <?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
    //echo '<p class="error">' . $login_error_msg . '</p>';
?>
<div id="sign_up" class="logIn_signUp_class">
	<form id="signupform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <h2>G&ampG Chat- Sign up</h2>
     <!-- <p>Please enter your username and desired password to sign up to chatting is for losers.</p>-->
		<label class="label_txt"  for="username">Username:</label>
		<input class="input_txt" type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
		<label class="label_txt"  for="password1">Password:</label>
		<input class="input_txt" type="password" id="password1" name="password1" /><br />
		<label class="label_txt"  for="password2">Password (retype):</label>
		<input class="input_txt" type="password" id="password2" name="password2" /><br /><br />
		<button class="btn bg_btn rounded" type="submit" value="Sign Up" name="submit" >Sign Up</button>
        <button class="btn bg_btn rounded leftArrow" type="button" value="Sign Up" name="" > << Log In</button>
	
  </form>
   <div id="signup_error"><?php echo '<p class="error">' . $signup_error_msg . '</p>'; ?></div>
	</div>
	</div>
	</div>
	

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
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
 echo '<span id="profile_etc_username" class="username">' . $_SESSION['username'] . '</span>';
 }?></div>
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
            <textarea type="text" id="text" class="rounded" name="text"></textarea>
            
            <input id="chat"  class="rounded" name="chat" type="hidden" value="<?php echo $_SESSION['username']; ?>"/>
            
            <input id="" class="rounded btn" type="submit" value="Enter" name="submit" onclick="clearit()" />
        
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