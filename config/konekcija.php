<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "sportskicentar";
$mysqli =new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);


if ($mysqli->connect_errno){
    exit("Nauspesna konekcija: greska> ".$mysqli->connect_error.", err kod>".$mysqli->connect_errno);
}

?>