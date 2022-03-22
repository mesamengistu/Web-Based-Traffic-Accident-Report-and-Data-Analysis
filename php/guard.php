<?php
session_start();
if(!isset($_SESSION['user_loggedid']))
{
 header('location:login.php');
 exit();
}

if(isset($_SESSION['user_loggedid']) != true)
{
 header('location:login.php');
 exit();

}

include '../classes/class.password.php';
include '../classes/class.user.php';

  $user = new User();