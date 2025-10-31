<?php
if (count($params["article"]) == 0): ?>
    <header>
        <h2>Error</h2>
    </header>
    <article>
        <h3>Article Not Found</h2>
    </article>
<?php
else:
    $article = $params["article"][0];
?>
    <header>
        <h2><?php echo $article["title"]; ?></h2>
    </header>

    <article>
        <img src="<?php echo UPLOAD_DIR . $article["image"]; ?>" alt="" />
        <p><?php echo $article["content"]; ?></p>
        <p><?php echo $article["published_date"]; ?> - <?php echo $article["full_name"]; ?></p>

        <a href="./index.php>">Return to Home</a>
    </article>
<?php endif; ?>