<?php
session_start();
unset($_SESSION['role']);
header('location: ../../../../index.php');