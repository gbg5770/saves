<?php
    
    
        require_once('connectvar.php');

if(isset($_GET['text'])){

$text= $_GET['text'];

$insertSite_sql = 'INSERT INTO SITE (site_url, site_name) VALUES('. $url. ',' . $sitename. ')';
$insertSite= mysql_query($insertSite_sql) or die(mysql_error());

<!-- If is set URL variables and insert is ok, show the site name -->
echo $sitename;
} else { 
echo 'Error! Please fill all fileds!';
}
>
?>
