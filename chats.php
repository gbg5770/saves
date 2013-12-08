<?php
        require_once('connectvar.php');
        
        $abc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        

      $query = "SELECT * FROM chating";
      $result = mysqli_query($abc, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<div id="foo">';
            echo '<p>'.$row['chats'].'</p>';
            echo '</div>';
            
   
}

        // Confirm success with the user
        mysqli_close($abc);
        exit();
      
           n
  

  mysqli_close($abc);  
  
?> 