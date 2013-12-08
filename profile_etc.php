 <div id="profile_etc">
 <div id="first"><?php if (isset($_SESSION['user_id'])) {
 echo '<span id="profile_etc_username" class="username">' . $_SESSION['username'] . '</span>'; }?></div>
<div id="more" class="more"> <?php  if (isset($_SESSION['user_id'])) { 
 echo '<a class="profile_etc_submenue" href="logout.php">Logout</a>';}?>
 <br/>
 <a class="profile_etc_submenue" href="viewprofile.php" />Profile</a>
 <br />
 <a class="profile_etc_submenue" href="http://g.rambam770.com/chat/editprofile.php" />Edit Profile</a>
 </div>
 </div>