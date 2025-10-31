<?php
require_once("../bootstrap.php");

// BASE params
$params["title"] = "Article / Web Technologies Blog";
$params["main"] = "single_article.php";
$params["randomArticle"] = $dbh->getRandomPosts();
$params["categories"] = $dbh->getCategories();

# SPECIFIC params
$id = -1;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$params["article"] = $dbh->getPostById($id);

require("../templates/base.php");
