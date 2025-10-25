<?php

class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Database Connection Failed.");
        }
    }

    public function getRandomPosts($n = 2)
    {
        $stmt = $this->db->prepare("SELECT article_id, title, image FROM article ORDER BY RAND() LIMIT ?");
        $stmt->bind_param("i", $n);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories()
    {
        $stmt = $this->db->prepare("SELECT category_id, name FROM category");
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticles()
    {
        $stmt = $this->db->prepare("SELECT `article_id`, `title`, `content`, `published_date`, `excerpt`, `image`, `author_id` name FROM article");
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
