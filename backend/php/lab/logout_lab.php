<?php
session_start();
unset($_SESSION['tipo']);
header("location: login_lab.php");
