<?php
session_start();
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('stocks.sqlite');
      }
   }

   $db = new MyDB();
  $user=$_POST["email"];
  $_SESSION["user"]=$user;
  $pass=$_POST["password"];
  if($user=='admin'&& $pass=='admin')
  {
    header('Location:admin/index.php');
  }
   $sql =<<<EOF
      SELECT * from COMPANY where USERNAME='$user' and PASS='$pass';
EOF;

   $ret = $db->query($sql);
   if($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
     header('Location:web/index.php');
   }
   echo "Wrong !User not found pls register ";
   //header('Location:index.html');
   $db->close();
?>
