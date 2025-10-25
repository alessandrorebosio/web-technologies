<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $params["title"] ?></title>

    <link rel="stylesheet" href="./css/style.css" />

</head>

<body>
    <header>
        <h1>Web Technologies Blog</h1>
    </header>

    <nav>
        <ul>
            <li><a href="./index.html">Home</a></li>
            <li><a href="./archive.html">Archive</a></li>
            <li><a href="./contact.html">Contact</a></li>
            <li><a href="./login.html">Login</a></li>
        </ul>
    </nav>

    <main>
        <?php require($params["main"]); ?>
    </main>

    <aside>
        <section>
            <header>
                <h2>Casual Post</h2>
            </header>

            <ul>
                <?php foreach ($params["randomArticle"] as $randomArticle): ?>
                    <li>
                        <img src="<?php echo UPLOAD_DIR . $randomArticle["image"]; ?>" alt="" />
                        <a href="#"><?php echo $randomArticle["title"]; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section>
            <header>
                <h2>Categories</h2>
            </header>
            <ul>
                <?php foreach ($params["categories"] as $category): ?>
                    <li><a href="#"><?php echo $category["name"]; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
    </aside>

    <footer>
        <p>Web Technologies - A.A 2025/2026</p>
    </footer>
</body>

</html>