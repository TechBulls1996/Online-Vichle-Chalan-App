<?php
session_start();

unset($_SESSION['ID']);
unset($_SESSION['USERNAME']);
header('location:index.php');
