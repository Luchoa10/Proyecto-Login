<?php
$SERVER="localhost";
$USERDB="root";
$PASSDB="";
$DBNAME="login";
$CONN=mysqli_connect($SERVER,$USERDB,$PASSDB,$DBNAME);
if ($CONN->connect_error){
    die("CONN FAILED". $CONN->connect_error);
}
?>