<?php
require_once("config/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "blog", 3306);
define("UPLOAD_DIR", "./upload/");