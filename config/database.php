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

    public function getPosts($n = -1)
    {
        $query = "SELECT article.article_id, article.title, article.published_date, article.excerpt, article.image, author.full_name AS author_name FROM article JOIN author ON article.author_id = author.author_id ORDER BY article.published_date DESC";
        if ($n > 0) {
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
            $stmt->bind_param("i", $n);
        }
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getAuthors()
    {
        $query = "SELECT a.username, a.full_name, GROUP_CONCAT(DISTINCT c.name ORDER BY c.name SEPARATOR ', ') AS argument FROM blog.author AS a JOIN blog.article AS ar ON ar.author_id = a.author_id JOIN blog.article_category AS ac ON ac.article_id = ar.article_id JOIN blog.category AS c ON c.category_id = ac.category_id WHERE a.active = 1 GROUP BY a.username, a.full_name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id)
    {
        $query = "SELECT ar.*, a.username, a.full_name FROM blog.article AS ar JOIN blog.author AS a ON a.author_id = ar.author_id WHERE ar.article_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostsByCategoryId($id)
    {
        $query = "SELECT a.article_id, a.title, a.published_date, a.excerpt, a.image, au.full_name AS author_name FROM article AS a JOIN author AS au ON a.author_id = au.author_id JOIN article_category AS ac ON ac.article_id = a.article_id WHERE ac.category_id = ? ORDER BY a.published_date DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
