<?php
require_once("../bootstrap.php");

$params["title"] = "Home / Web Technologies Blog";
$params["main"] = "list_article.php";
$params["randomArticle"] = $dbh->getRandomPosts();
$params["categories"] = $dbh->getCategories();

require("../templates/base.php");