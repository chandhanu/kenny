<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('admin/stocks.sqlite');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully<br>";
   }


$user=$_POST["username"];
$pass=$_POST["password"];
$balance=$_POST["balance"];
$sql =<<<EOF
   CREATE TABLE if not exists $user
   (USERID INTEGER PRIMARY KEY  AUTOINCREMENT   NOT NULL ,
   USERNAME TEXT NOT NULL,
   PASS           TEXT    NOT NULL,
   BALANCE            FLOAT     NOT NULL);
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully";
   }
   $sql =<<<EOF
     INSERT INTO COMPANY (USERNAME,PASS,BALANCE)
     VALUES ('$user', '$pass', $balance );


EOF;

  $ret = $db->exec($sql);
  if(!$ret) {
     echo $db->lastErrorMsg();
  } else {
     echo "Records created successfully<br><a href=\"index.html\">PLS LOGIN AGAIN </a>";
  }

   $db->close();
?>
