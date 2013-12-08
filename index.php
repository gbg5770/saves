<?php
  require_once('connectvar.php');

  // Start the session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
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
          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
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
   
<script type="text/javascript">
//jquery
    $(document).ready(function() {
        setInterval(function(){
            var user = $('.user').html();
            var chat = $('.chat').html();
            var f= '(1)' + user + chat;
            document.title = f;
        }, 3000);
    });

</script>
<script src="ajax.js" language="javascript"></script>
        <script>



     

            function changeTitle() { document.title = "testing"; }
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
              document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
              }
            }
            xmlhttp.open("post","http://g.rambam770.com/chat/chats.php",true);
            xmlhttp.send();
            }   
    </script>

    <style>
        body{
            background: url('http://www.designbolts.com/wp-content/uploads/2012/12/White-wall-Seamless-Pattern-For-Website-Background.jpg') #323232;
        }
        #mydiv {
            margin:0 auto;
            margin-top: 20px;
            width: 400px;
            padding-right: 100px;
            height:500px;
            overflow: scroll;
            overflow-x: hidden;
            overflow-y: hidden;
            color: black;
        }
        #mydiv:hover {
            overflow-y: visible;
        }
        .each {
            padding-bottom: 20px;
        }
        #add {
            margin:0 auto;
            margin-top:50px;
            width: 500px;
            background: url('img/solid_gray.jpg') repeat-x #d0d0d0;
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
            color: #516D7F !important;
            display: inline-block;
            font-size: 13px;
            height: 29px;
            text-align: center;
            text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.4);
            width: 75px;
            margin: 0;
            cursor: pointer;
        }
        .rounded {
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }
        #logout {
            background-color: #bbb;
            border: 1px solid #eee !important;
            text-decoration:none;
            color: #FFFFFF !important;
            padding: 5px 9px;
            text-shadow: 1px 1px 0 #888;
            -moz-box-shadow: 0 0 7px #888 inset;
            -webkit-box-shadow: 0 0 7px #888 inset;
            box-shadow: 0 0 7px #888 inset;
        }
    </style>
</head>
<body onload="m()" >
    
<div id="wrap" >
    <?php  if (!isset($_SESSION['user_id'])) {
         echo'<a href="signup.php" >signup</a>';
    }    else {
         echo '<a id="logout" href="logout.php">logout(' . $_SESSION['username'] . ')</a>';
    }
    ?>
    
   
 <?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['user_id'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

  <form id="form4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <h3>G&AMPG - Log In</h3>
    <fieldset>
      <legend>Log In</legend>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" />
    </fieldset>
    <button type="submit" value="Log In" name="submit">Log In</button>
  </form>

<?php
  }
  else {
    // Confirm the successful log-in
    //echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>
 <?php  if (isset($_SESSION['user_id'])) { ?>
 <div id="addmydiv">
    <div id="add" class="rounded">
        <form name="form" action="javascript:insert()" method="post" >
            <input type="text" id="text" class="rounded" name="text"/>
           <!-- <textarea name="text" id="text" style="width:250px;"></textarea>   -->
            <input id="chat"  class="rounded" name="chat" type="hidden" value="<?php echo $_SESSION['username']; ?>"/>
            <input id="enter" class="rounded" type="submit" value="Enter" name="submit" onclick="clearit()" />
        
        </form>    
    </div>
        <div id="insert_response"></div>
        <div id="mydiv">on sec please</div>
    </div>       
   <?php }    else {
         echo'please sign in';
    }
    ?>
    


</div>
</body>
</html>