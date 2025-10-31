<?php
require_once("../bootstrap.php");

// BASE params
$params["title"] = "Login / Web Technologies Blog";
$params["main"] = "login_form.php";
$params["randomArticle"] = $dbh->getRandomPosts();
$params["categories"] = $dbh->getCategories();

# SPECIFIC params
$params["page_title"] = "Login";

require("../templates/base.php");
