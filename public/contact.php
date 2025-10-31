<?php
require_once("../bootstrap.php");

// BASE params
$params["title"] = "Contact / Web Technologies Blog";
$params["main"] = "blog_authors.php";
$params["randomArticle"] = $dbh->getRandomPosts();
$params["categories"] = $dbh->getCategories();

# SPECIFIC params
$params["page_title"] = "Blog Authors";
$params["authors"] = $dbh->getAuthors();

require("../templates/base.php");

function getIdFromName($name)
{
    return preg_replace("/[^a-z]/", '', strtolower($name));
}
