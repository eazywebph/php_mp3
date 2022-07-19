<?php
include('inc_session.php');
session_unset();
session_destroy();
header('location:../index.php');
?>