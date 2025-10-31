<header>
    <h2><?php echo $params["page_title"] ?></h2>
</header>

<?php foreach ($params["articles"] as $article): ?>
    <article>
        <img src="<?php echo UPLOAD_DIR . $article["image"]; ?>" alt="" />
        <h3><?php echo $article["title"] ?></h3>
        <p><?php echo $article["published_date"]; ?> - <?php echo $article["author_name"] ?></p>
        <p><?php echo $article["excerpt"] ?></p>

        <a href="./article.php?id=<?php echo urlencode($article["article_id"]); ?>">Read all</a>
    </article>
<?php endforeach; ?>