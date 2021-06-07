<?php

$host="localhost";
    $port="5432";
    $user="postgres";
    $pass="l1nux.l1nux";
    $dbname="panoramix";


    $dbconn3 = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");


    if(!$dbconn3)
        echo "<p><i>No me conecte</i></p>";
    else
       //echo "<p><i>Me conecte</i></p>";


?>