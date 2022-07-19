<?php
    $host_name  = "localhost";
    $database   = "miguelitophotography";
    $user_name  = "miguelitophotography";
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