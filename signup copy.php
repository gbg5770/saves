  <?php
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
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
          header('Location: ' . $home_url);

        }
        else {
             $signup_error_msg =  'less then one';
        }
        
        // Confirm success with the user
        ///$signup_error_msg = '<div class="error" id="error_login" >Your new account has been successfully created.</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);

        mysqli_close($dbc);
        //exit(); ???
      }
      else {
        // An account already exists for this username, so display an error message
         $signup_error_msg = '<div class="error" id="error_login" >An account already exists for this username. Please use a different address.</div>';
        $username = "";
		?>
	   <script>scroll_sign_up()</script>
	   <?php
      }
    }
    else {
       $signup_error_msg = '<div class="error" onclick="scrollRight();" id="error_login" >You must enter all of the sign-up data, including the desired password twice.</div>';
	   ?>
	   <script>scroll_sign_up()</script>
	   <?php
    }
  }

  mysqli_close($dbc);
?>