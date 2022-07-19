<?php
    $host_name  = "db680746263.db.1and1.com";
    $database   = "db680746263";
    $user_name  = "dbo680746263";
    $password   = "T233525-25";

    $connect = mysqli_connect($host_name, $user_name, $password, $database);
    
    if(mysqli_connect_errno())
    {
    echo '<p>Failed to connect to MySQL: '.mysqli_connect_error().'</p>';
    }
    else
    {
    echo '<p>Connection to MySQL server successfully established.</p>';
    }
?>