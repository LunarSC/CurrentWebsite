<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "pmbp0u24bbsx";
 $dbpass = "Tunagiraffe1!";
 $db = "Website";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


 return $conn;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }
