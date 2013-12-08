<?php
  require_once('connectvar.php');

  // Start the session
  session_start();

  // Clear the error message
  $error_msg = "";

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
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>>_<</title>
   <script type="text/javascript" src="../js/jquery.min.js"></script>
   <script src="ajax.js" language="javascript"></script>
   <script src="ajaxonline.js" language="javascript"></script>
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
</script>

        <script>

     
            function cleartitle() {
                document.title = '>_<';
            }
            function clear() {
                document.getElementById("text").value = '';
            }
            function clearit()
            {
            setTimeout(function(){document.getElementById("text").value = ''},100);
            }
            function m()
            {
                setInterval("loadXMLDoc()", 2000);
                setInterval("useronline()", 1000);
            }
            
            function loadXMLDoc()   {
            
            
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
                if (resp !== mydiv) {
                    document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
                    
                    setTimeout(function(){
                        var user = $('.user').html();
                        var chat = $('.chat').html();
                        var f= '(1) ' + user + ': ' + chat;
                        var id = $('#username').html();
                            if (id !== user) {
                                document.title = f;
                            }
                    },100);
                }
              }
            }
            xmlhttp.open("post","http://g.rambam770.com/chat/chats.php",true);
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

    <style>
        body{
            background: url('http://www.designbolts.com/wp-content/uploads/2012/12/White-wall-Seamless-Pattern-For-Website-Background.jpg') #323232;
        }
        #signupform {
            width:500px;
            float:left;
        }
        #loginform {
            width:500px;
            float:right;
        }
        #mydiv {
            margin:0 auto;
            margin-top: 20px;
            position: relative;
            left:20px;
            width: 420px;
            padding-right: 120px;
            height:500px;
            overflow: scroll;
            overflow-x: hidden;
           // overflow-y: hidden;
            color: black;
        }
        #mydiv:hover {
            //overflow-y: visible;
        }
        .each {
            padding-bottom: 35px;
            width:500px;
        }
        #add {
            margin:0 auto;
            margin-top:50px;
            width: 500px;
            background:  #d0d0d0;
            position: relative;
            padding: 10px;
            border: 1px solid #fff;
        }
        #bottombar {
            background: url('img/solid_gray.jpg') repeat-x #d0d0d0;
            position: relative;
            padding: 10px;
            border: 1px solid #fff;
        }
        #text {
            background:  aliceblue;
            height: 26px;
            width: 400px;
            font: 13px/26px Calibri,Arial,sans-serif;
            color: #777;
            border: 1px solid;
            border-color: #c1c1c1 #eee #eee #c1c1c1;
            text-shadow: 1px 1px 0 #E4E4E4;
            padding: 0 5px;
            margin-right: 5px;
            outline: none;
        }
        #enter {
            background: #B3D4EA  no-repeat;
            border: none !important;
            color: #516D7F; //!important;
            display: inline-block;
            font-size: 13px;
            height: 29px;
            text-align: center;
            text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.4);
            width: 75px;
            margin: 0;
            cursor: pointer;
			-webkit-transition: .5s ease;
			-moz-transition: .5s ease;
			-o-transition: .5s ease;
			-ms-transition: .5s ease;
			transition: .5s ease;
        }
		 #enter:hover {
			background: #8eb8d4;
			box-shadow: 0px 0px 2px #112b3c;
			color: #8eb1c8;
			
			-webkit-transition: .5s ease;
			-moz-transition: .5s ease;
			-o-transition: .5s ease;
			-ms-transition: .5s ease;
			transition: .5s ease;
		 }
		 
		 #enter:active, #enter:focus {
			background: #558db2;
			 outline: 0;
			box-shadow: 0px 0px 2px #112b3c;
			
			-webkit-transition: .5s ease;
			-moz-transition: .5s ease;
			-o-transition: .5s ease;
			-ms-transition: .5s ease;
			transition: .5s ease;
		 }
		 
        .rounded {
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }
        #logout {
            background-color: #D0D0D0;
            text-decoration:none;
            position: relative;
            top: 20px;
            left:20px;
            padding: 5px 9px;
            color: #516D7F;
            cursor: pointer;
        }
            
        
        #logoutfirst {
            background-color: #bbb;
            border: 1px solid #eee !important;
            text-decoration:none;
            color: #FFFFFF !important;
            padding: 5px 9px;
            text-shadow: 1px 1px 0 #888;
            -moz-box-shadow: 0 0 7px #888 inset;
            -webkit-box-shadow: 0 0 7px #888 inset;
            box-shadow: 0 0 7px #888 inset;
            position: relative;
            top: 20px;
            left:20px;
        }
        #insert_response {
            position: relative;
            top: 10px;
            left:400px;
        }
        .time {
            float:right;
        }
        .chat {
            position: relative;
            top: 10px;
        }
        .user {
            color: #516D7F;
        }
    </style>
</head>
<body onload="m()" onclick="insertonlineuser()">
    
<div id="wrap" onclick="cleartitle()">
    <?php  if (!isset($_SESSION['username'])) {
  //require_once('appvars.php');
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
            echo 'ffg';
        }
        // Confirm success with the user
        //echo '<p>Your new account has been successfully created. You\'re now ready to log in and <a href="index.php">home</a>.</p>';
        //header('Location: ' . $_SERVER['HTTP_REFERER']);

        mysqli_close($dbc);
        //exit();
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
 <?php  if (!isset($_SESSION['username'])) { ?>
  
  <form id="signupform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>

      <legend><h3>Registration Info</h3></legend>
     <!-- <p>Please enter your username and desired password to sign up to chatting is for losers.</p>-->
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br />
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
  <?php } } ?>
    
   
 <?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

  <form id="loginform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
    <fieldset>
      <legend><h3>G&AMPG - Log In</h3></legend>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" />
    </fieldset>
    <button type="submit" value="Log In" name="submitlogin">Log In</button>
  </form>

<?php
  }
  else {
    // Confirm the successful log-in
    //echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>
 <?php  if (isset($_SESSION['user_id'])) { 
 echo '<a id="logout" href="logout.php">logout(<span id="username">' . $_SESSION['username'] . '</span>)</a>';
 ?>
 <div id="addmydiv">
    <div id="add" class="rounded">
        <form name="form" action="javascript:insert()" method="post" >
            <input type="text" id="text" class="rounded" name="text"/>
            
            <input id="chat"  class="rounded" name="chat" type="hidden" value="<?php echo $_SESSION['username']; ?>"/>
            
            <input id="enter" class="rounded" type="submit" value="Enter" name="submit" onclick="clearit()" />
        
        </form>    
    </div>
        <div id="insert_response"></div>
        <div id="mydiv"><p><em>Loading ...</em></p></div>
        
       
    </div>
 
 
 <div id="useronline"></div>
 
 
   <?php }    else {
         //echo'please sign in';
    }
    ?>
    


</div>
</body>
</html>
            