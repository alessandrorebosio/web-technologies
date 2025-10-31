<?php
require_once("../bootstrap.php");

// BASE params
$params["title"] = "Archive / Web Technologies Blog";
$params["main"] = "list_article.php";
$params["randomArticle"] = $dbh->getRandomPosts();
$params["categories"] = $dbh->getCategories();

# SPECIFIC params
$params["page_title"] = "Article Archive";
$params["articles"] = $dbh->getPosts();

require("../templates/base.php");
