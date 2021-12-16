<?php
session_start();//session is a way to store information (in variables) to be used across multiple pages.

unset($_SESSION['login']);

session_destroy();

// header("Location: ");//use for the redirection to some page
redirect('home/login', "refresh");

?>