<?php
require_once("../bootstrap.php");

// BASE params
$params["title"] = "ByCategories / Web Technologies Blog";
$params["main"] = "list_article.php";
$params["randomArticle"] = $dbh->getRandomPosts();
$params["categories"] = $dbh->getCategories();

# SPECIFIC params
$id = -1;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
$params["page_title"] = "By Categories";
$params["articles"] = $dbh->getPostsByCategoryId($id);

require("../templates/base.php");
