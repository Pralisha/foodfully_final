<?php
session_start();
echo $_SESSION['login'];
if ( !(isset($_SESSION['login']) && $_SESSION['login'] == 'admin'))
{
    header('Location:../home.php');
}

?>