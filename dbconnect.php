
<?php
//sets connection credentials
  $DBhost = "localhost";
  $DBuser = "root";
  $DBpass = "";
  $DBname = "pubgo";
  //connects anfd logs into DB
  $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);

?>